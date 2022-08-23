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
use Jasara\AmznSPA\DataTransferObjects\Requests\Tokens\CreateRestrictedDataTokenRequest;
use Jasara\AmznSPA\DataTransferObjects\RestrictedDataTokenDTO;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MetadataSchema;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Exceptions\GrantlessAuthenticationException;
use Jasara\AmznSPA\Exceptions\RateLimitException;
use Jasara\AmznSPA\Traits\ValidatesParameters;
use Psr\Http\Message\RequestInterface;

class AmznSPAHttp
{
    use ValidatesParameters;

    private PendingRequest $http;

    private ?Request $request = null;

    private bool $retried = false;

    private array $restricted_data_elements = [];

    public function __construct(
        private AmznSPAConfig $config,
        private ?string $grantless_resource = null,
    ) {
    }

    public function get(string $url, array $data = []): array
    {
        $data = $this->transformArraysToStrings($data);

        return $this->call('get', $url, $data);
    }

    public function put(string $url, array $data): array
    {
        return $this->call('put', $url, $data);
    }

    public function post(string $url, array $data): array
    {
        return $this->call('post', $url, $data);
    }

    public function delete(string $url): array
    {
        return $this->call('delete', $url);
    }

    public function getGrantless(string $url, array $data = []): array
    {
        return $this->call(
            method: 'get',
            url: $url,
            grantless: true,
            data: $data
        );
    }

    public function postGrantless(string $url, array $data): array
    {
        return $this->call(
            method: 'post',
            url: $url,
            data: $data,
            grantless: true
        );
    }

    public function deleteGrantless(string $url): array
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
    }

    private function call(string $method, string $url, array $data = [], bool $grantless = false): array
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
                    throw new GrantlessAuthenticationException(
                        $e->response,
                    );
                }

                throw new AuthenticationException(
                    $e->response,
                    $this->config->isPropertySet('authentication_exception_callback') ? $this->config->getAuthenticationExceptionCallback() : null,
                );
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
        $path = Str::replace($this->config->getMarketplace()->getBaseUrl(), '', $url);

        $request = new CreateRestrictedDataTokenRequest(
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

        $this->config->setRestrictedDataToken(new RestrictedDataTokenDTO(
            access_token: $response->restricted_data_token,
            expires_at: $response->expires_in,
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
        if ($this->config->shouldGetRdtTokens() && $this->isRestrictedDataPath($url, $method)) {
            $restricted_token = $this->config->getRestrictedDataToken();
            if (! $restricted_token->access_token || ($restricted_token->expires_at && $restricted_token->expires_at->subMinutes(5)->isPast())) {
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

    private function isRestrictedDataPath(string $url, string $method): bool
    {
        $patterns = [
            '#.*orders/v0/orders$#',
            '#.*orders/v0/orders/[^/]*$#',
            '#.*orders/v0/orders/.*/orderItems$#',
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

    private function transformArraysToStrings(array $data): array
    {
        foreach ($data as $key => $param) {
            if (is_array($param)) {
                if (array_values($param) === $param) { // Is not an associative array
                    // Amazon cannot handle commas in string arrays in GET calls
                    $param = array_filter($param, function ($value) {
                        return ! str_contains($value, ',');
                    });

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

        return new MetadataSchema(
            jasara_notes: $jasara_notes,
            amzn_request_id: $amzn_request_id,
        );
    }

    private function handleResponse(Response $response): array
    {
        return array_merge(array_keys_to_snake($response->json() ?: []), [
            'metadata' => $this->getMetaData($response),
        ]);
    }
}
