<?php

namespace Jasara\AmznSPA;

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use Exception;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Arr;
use Psr\Http\Message\RequestInterface;

class AmznSPAHttp
{
    private PendingRequest $http;

    private ?Request $request = null;

    private bool $retried = false;

    public function __construct(
        private AmznSPAConfig $config,
        private ?string $grantless_resource = null,
    ) {
    }

    public function get(string $url, array $data = []): array
    {
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

    private function call(string $method, string $url, array $data = [], bool $grantless = false): array
    {
        $this->setupHttp($this->config->getHttp(), $grantless);

        if ($this->config->shouldUseTestEndpoints()) {
            $url = str_replace('//sellingpartnerapi', '//sandbox.sellingpartnerapi', $url);
        }

        try {
            /** @var \Illuminate\Http\Client\Response $response */
            $response = $this->http->$method($url, $data);

            if ($response->failed()) {
                // This only seems to be required in a Laravel environment
                $response->throw(); // @codeCoverageIgnore
            }

            $this->config->getLogger()->debug('[AmznSPA] Response ' . strtoupper($method) . ' ' . $url, [
                'response_headers' => $response->headers(),
                'response_data' => $response->json(),
            ]);

            return array_keys_to_snake($response->json() ?: []);
        } catch (RequestException $e) {
            try {
                if ($this->shouldReturnErrorResponse($e)) {
                    return array_keys_to_snake($e->response->json());
                }

                $this->handleRequestException($e, $grantless);
            } catch (Exception $e) {
                $this->logException($e, $method, $url);

                throw $e;
            }

            return $this->call($method, $url, $data, $grantless);
        } catch (\Exception $e) {
            $this->logException($e, $method, $url);

            throw $e;
        }
    }

    private function shouldRefreshToken(array $response): bool
    {
        return Arr::get($response, 'errors.0.details') === 'The access token you provided has expired.';
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

    private function setupHttp(Factory $http, bool $grantless = false): void
    {
        $this->http = $http->withHeaders([
            'x-amz-access-token' => $this->getToken($grantless),
            'user-agent' => $this->buildUserAgent(),
        ]);

        $this->http->beforeSending(function (Request $request) {
            $this->config->getLogger()->debug('[AmznSPA] Pre-Request ' . $request->method() . ' ' . $request->url(), [
                'unsigned_request_headers' => Arr::except($request->headers(), 'x-amz-access-token'),
                'request_data' => $request->data(),
            ]);

            $this->request = $request;
        });

        $this->signRequest($this->config->getMarketplace()->getAwsRegion());
    }

    private function getToken(bool $grantless = false): string
    {
        if (! $grantless) {
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

        $this->http = $this->http->withMiddleware($middleware);
    }

    private function handleRequestException(RequestException $e, bool $grantless)
    {
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
        if ($e->response->status() !== 400) {
            return false;
        }

        if (! Arr::get($e->response->json(), 'errors')) {
            return false;
        }

        return true;
    }

    private function logException(Exception $e, $method, $url)
    {
        $request_headers = $this->request ? $this->request->headers() : null;
        if ($request_headers) {
            Arr::forget($request_headers, 'x-amz-access-token');
        }
        $this->config->getLogger()->error('[AmznSPA] Response Error ' . strtoupper($method) . ' ' . $url . ' -- ' . $e->getMessage(), [
            'unsigned_request_headers' => $request_headers,
            'request_data' => $this->request ? $this->request->data() : null,
            'response_headers' => isset($e->response) ? $e->response->headers() : null,
            'response_data' => isset($e->response) ? $e->response->json() : null,
            'response_code' => isset($e->response) ? $e->response->status() : null,
        ]);
    }
}
