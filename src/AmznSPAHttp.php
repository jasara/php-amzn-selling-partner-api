<?php

namespace Jasara\AmznSPA;

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Constants\JasaraNotes;
use Jasara\AmznSPA\Data\Requests\Tokens\CreateRestrictedDataTokenRequest;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\RestrictedDataToken;
use Jasara\AmznSPA\Data\Schemas\ErrorListSchema;
use Jasara\AmznSPA\Data\Schemas\ErrorSchema;
use Jasara\AmznSPA\Data\Schemas\MetadataSchema;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Exceptions\GrantlessAuthenticationException;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Exceptions\RateLimitException;
use Jasara\AmznSPA\Traits\ValidatesParameters;
use Psr\Http\Message\RequestInterface;

/**
 * @template TResponse of BaseResponse
 */
class AmznSPAHttp
{
    use ValidatesParameters;
    private PendingRequest $http;
    private ?Request $request = null;
    private bool $retried = false;
    private array $restricted_data_elements = [];
    private bool $use_restricted_data_token = false;

    /** @var class-string<BaseResponse>|null */
    private ?string $response_class = null;

    public function __construct(
        private AmznSPAConfig $config,
        private ?string $grantless_resource = null,
    ) {
    }

    /**
     * @template TResponse of BaseResponse
     *
     * @param class-string<TResponse> $response_class
     *
     * @return AmznSpaHttp<TResponse>
     */
    public function responseClass(
        string $response_class,
    ): self {
        if (! is_a($response_class, BaseResponse::class, true)) {
            throw new AmznSPAException('Response class must extend BaseResponse');
        }

        $this->response_class = $response_class;

        return $this;
    }

    /**
     * @return TResponse|array
     */
    public function get(string $url, array $data = []): array|object
    {
        $data = $this->transformGetRequestArraysToStrings($data);

        return $this->call('get', $url, $data);
    }

    /**
     * @return TResponse|array
     */
    public function put(string $url, array $data): array|object
    {
        return $this->call('put', $url, $data);
    }

    /**
     * @return TResponse|array
     */
    public function patch(string $url, array $data): array|object
    {
        return $this->call('patch', $url, $data);
    }

    /**
     * @return TResponse|array
     */
    public function post(string $url, array $data): array|object
    {
        return $this->call('post', $url, $data);
    }

    /**
     * @return TResponse|array
     */
    public function delete(string $url): array|object
    {
        return $this->call('delete', $url);
    }

    /**
     * @return TResponse|array
     */
    public function getGrantless(string $url, array $data = []): array|object
    {
        return $this->call(
            method: 'get',
            url: $url,
            grantless: true,
            data: $data
        );
    }

    /**
     * @return TResponse|array
     */
    public function postGrantless(string $url, array $data): array|object
    {
        return $this->call(
            method: 'post',
            url: $url,
            data: $data,
            grantless: true
        );
    }

    /**
     * @return TResponse|array
     */
    public function deleteGrantless(string $url): array|object
    {
        return $this->call(
            method: 'delete',
            url: $url,
            grantless: true
        );
    }

    public function setRestrictedDataElements(array $restricted_data_elements): void
    {
        $this->validateIsArrayOfStrings($restricted_data_elements, ['buyerInfo', 'shippingAddress']);

        $this->restricted_data_elements = $restricted_data_elements;

        $this->useRestrictedDataToken();
    }

    public function useRestrictedDataToken(): void
    {
        $this->use_restricted_data_token = true;
    }

    /**
     * @return TResponse|array
     */
    private function call(string $method, string $url, array $data = [], bool $grantless = false): array|object
    {
        $this->setupHttp($this->config->getHttp(), $grantless, $url, $method);

        if ($this->config->shouldUseTestEndpoints()) {
            $url = str_replace('//sellingpartnerapi', '//sandbox.sellingpartnerapi', $url);
        }

        try {
            /** @var Response $response */
            $response = $this->http->$method($url, $data);

            if ($response->failed()) {
                // Not sure why some responses don't throw request exceptions
                $response->throw();
            }

            $this->callResponseCallback($response);

            return $this->handleResponse($response, $method, $url);
        } catch (RequestException $e) {
            $this->callResponseCallback($e->response);

            if ($this->isAuthenticationException($e)) {
                if ($grantless) {
                    throw new GrantlessAuthenticationException($e->response);
                }

                throw new AuthenticationException($e->response, $this->config->isPropertySet('authentication_exception_callback') ? $this->config->getAuthenticationExceptionCallback() : null);
            }

            if ($e->response->status() === 429) {
                throw new RateLimitException(previous: $e);
            }

            if ($this->shouldReturnErrorResponse($e)) {
                return $this->handleResponse($e->response, $method, $url);
            }

            $this->handleRequestException($e, $grantless);

            return $this->call($method, $url, $data, $grantless);
        }
    }

    private function shouldRefreshToken(array $response): bool
    {
        if (Arr::get($response, 'errors.0.details') === 'The access token you provided has expired.') {
            return true;
        }

        if (Arr::get($response, 'error') === 'invalid_grant') {
            return true;
        }

        return false;
    }

    private function shouldRetry(): bool
    {
        if ($this->retried) {
            return false;
        }

        $this->retried = true;

        return true;
    }

    private function refreshTokens(): void
    {
        $amzn = new AmznSPA($this->config);

        $refresh_token = $this->config->getTokens()->refresh_token;

        if (! $refresh_token) {
            throw new AmznSPAException('Refresh token is not set');
        }

        $new_tokens = $amzn->lwa->getAccessTokenFromRefreshToken($this->config->getTokens()->refresh_token);

        $this->config->setTokens($new_tokens);
    }

    private function refreshGrantlessToken()
    {
        $scope = 'sellingpartnerapi::' . $this->grantless_resource;

        $amzn = new AmznSPA($this->config);
        $token = $amzn->lwa->getGrantlessAccessToken($scope);

        $this->config->setGrantlessToken($token);
    }

    private function refreshRdtToken(string $url, string $method)
    {
        $path = $this->getRestrictedTokenPathFromUrl($url);

        $request = CreateRestrictedDataTokenRequest::from(
            restricted_resources: [
                [
                    'method' => strtoupper($method),
                    'path' => $path,
                    'data_elements' => $this->restricted_data_elements,
                ],
            ],
        );

        $amzn = new AmznSPA($this->config);
        $response = $amzn->tokens->createRestrictedDataToken($request);

        if ($response->errors) {
            throw new AmznSPAException(implode(',', $response->errors->pluck('message')->toArray() ?: []));
        }

        $this->config->setRestrictedDataToken(new RestrictedDataToken(
            access_token: $response->restricted_data_token,
            expires_at: $response->expires_in,
            path: $path,
        ));
    }

    private function setupHttp(PendingRequest $http, bool $grantless = false, string $url = '', string $method = ''): void
    {
        $this->http = $http->withHeaders([
            'x-amz-access-token' => $this->getToken($grantless, $url, $method),
            'user-agent' => $this->buildUserAgent(),
        ]);

        $middleware = new HttpLoggerMiddleware($this->config->getLogger());

        $this->http->withMiddleware($middleware->buildCallable());

        $this->signRequest($this->config->getMarketplace()->getAwsRegion());
    }

    private function getToken(bool $grantless, string $url, string $method): string
    {
        if ($this->shouldGetRestrictedDataToken($url, $method)) {
            $restricted_token = $this->config->getRestrictedDataToken();

            if (! $this->isRestrictedTokenCompatibleWithPath($restricted_token, $url)) {
                $this->refreshRdtToken($url, $method);
            } elseif (! $restricted_token->access_token || ($restricted_token->expires_at && $restricted_token->expires_at->subMinutes(5)->isPast())) {
                $this->refreshRdtToken($url, $method);
            }

            return $this->config->getRestrictedDataToken()->access_token;
        } elseif (! $grantless) {
            $tokens = $this->config->getTokens();
            if (! $tokens->access_token || ($tokens->expires_at && $tokens->expires_at->subMinutes(5)->isPast())) {
                $this->refreshTokens();
            }

            return $this->config->getTokens()->access_token;
        } else {
            $grantless_token = $this->config->getGrantlessToken();
            if (! $grantless_token->access_token || ($grantless_token->expires_at && $grantless_token->expires_at->subMinutes(5)->isPast())) {
                $this->refreshGrantlessToken();
            }

            return $this->config->getGrantlessToken()->access_token;
        }
    }

    private function shouldGetRestrictedDataToken(string $url, string $method): bool
    {
        if (! $this->config->shouldGetRdtTokens()) {
            return false;
        }

        if (! $this->isRestrictedDataPath($url, $method)) {
            return false;
        }

        if (! $this->use_restricted_data_token) {
            return false;
        }

        return true;
    }

    private function isRestrictedDataPath(string $url, string $method): bool
    {
        $patterns = [
            '#.*orders/v0/orders$#',
            '#.*orders/v0/orders/[^/]*$#',
            '#.*orders/v0/orders/.*/orderItems$#',
            '#.*reports/.*/documents/.*$#',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url) === 1) {
                return true;
            }
        }

        if (preg_match('#.*mfn/v0/shipments/[^/]*$#', $url) === 1 && $method === 'get') {
            return true;
        }

        return false;
    }

    private function getRestrictedTokenPathFromUrl(string $url): string
    {
        $path = Str::replace($this->config->getMarketplace()->getBaseUrl(), '', $url);

        return $path;
    }

    private function isRestrictedTokenCompatibleWithPath(RestrictedDataToken $token, string $url): bool
    {
        $path = $this->getRestrictedTokenPathFromUrl($url);

        if ($token->path && $token->path !== $path) {
            return false;
        }

        return true;
    }

    private function buildUserAgent(): string
    {
        $user_agent = 'Jasara.AmznSPA/0.1 (Language=PHP/';
        $user_agent .= phpversion();
        $user_agent .= '; Platform=';
        $user_agent .= php_uname('s'); // Operating system name
        $user_agent .= '/';
        $user_agent .= php_uname('v'); // Operating system version
        $user_agent .= ')';

        return $user_agent;
    }

    private function signRequest(string $aws_region): void
    {
        $middleware = Middleware::mapRequest(function (RequestInterface $request) use ($aws_region) {
            $signer = new SignatureV4('execute-api', $aws_region);
            $credentials = new Credentials(
                $this->config->getApplicationKeys()->aws_access_key,
                $this->config->getApplicationKeys()->aws_secret_key
            );

            $request = $request->withoutHeader('Authorization');
            $request = $request->withoutHeader('X-Amz-Date');

            $signed_request = $signer->signRequest($request, $credentials);

            return $request->withHeader('Authorization', $signed_request->getHeader('Authorization'))
                ->withHeader('X-Amz-Date', $signed_request->getHeader('X-Amz-Date'));
        });

        $this->http->withMiddleware($middleware);
    }

    private function callResponseCallback(Response $response): void
    {
        if ($this->config->isPropertySet('response_callback')) {
            $callback = $this->config->getResponseCallback();

            $callback($response);
        }
    }

    private function handleRequestException(RequestException $e, bool $grantless)
    {
        if (! $e->response->json()) {
            throw $e;
        }

        if (! $this->shouldRefreshToken($e->response->json())) {
            throw $e;
        }
        if (! $this->shouldRetry()) {
            throw $e;
        }

        if (! $grantless) {
            $this->refreshTokens();
        } else {
            $this->refreshGrantlessToken();
        }
    }

    public function shouldReturnErrorResponse(RequestException $e): bool
    {
        if (! in_array($e->response->status(), [400, 404])) {
            return false;
        }

        if (! Arr::get($e->response->json(), 'errors')) {
            return false;
        }

        return true;
    }

    private function isAuthenticationException(RequestException $e): bool
    {
        if (in_array($e->response->status(), [400, 401, 403])) {
            if (str_contains(Arr::get($e->response->json(), 'errors.0.details', ''), 'token you provided has expired')) {
                return false;
            }

            $message = Arr::get($e->response->json(), 'errors.0.message', '');
            if (Str::contains($message, [
                'Access to requested resource is denied',
                'Invalid partyId',
                'hasn\'t registered in FBA in marketplace',
                'No MWS Authorization exists',
                'No MWS Authorization found',
            ])) {
                return true;
            }
        }

        return false;
    }

    private function transformGetRequestArraysToStrings(array $data): array
    {
        foreach ($data as $key => $param) {
            if (is_array($param)) {
                if (array_values($param) === $param) { // Is not an associative array
                    // Amazon cannot handle commas in string arrays in GET calls

                    $has_commas = array_filter($param, function ($value) {
                        return str_contains($value, ',');
                    });

                    if (count($has_commas) && count($param) > 1) {
                        throw new InvalidParametersException('You cannot make a request for multiple SKUs when one of those SKUs contains a comma');
                    }

                    $data[$key] = implode(',', $param);
                }
            }
        }

        return $data;
    }

    private function getMetadata(Response $response): MetadataSchema
    {
        $data = $response->json();
        $headers = $response->headers();

        $jasara_notes = JasaraNotes::findNote(Arr::get($data, 'errors.0.message', ''));
        $amzn_request_id = Arr::get($headers, 'x-amzn-RequestId.0');
        $amzn_request_timestamp = Arr::get($headers, 'Date.0');

        return new MetadataSchema(
            jasara_notes: $jasara_notes,
            amzn_request_id: $amzn_request_id,
            amzn_request_timestamp: $amzn_request_timestamp,
        );
    }

    private function handleResponse(Response $response): array|BaseResponse
    {
        $response_array = array_keys_to_snake($response->json() ?: []);

        if ($this->response_class) {
            /** @var BaseResponse */
            $mapped_response = $this->response_class::from($response_array);

            if (array_key_exists('errors', $response_array)) {
                $mapped_response->setErrors(
                    ErrorListSchema::make(array_map(fn ($error) => ErrorSchema::from($error), $response_array['errors']))
                );
            }

            $mapped_response->setMetadata($this->getMetaData($response));

            return $mapped_response;
        }

        return $response_array;
    }
}
