<?php

namespace Jasara\AmznSPA;

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Psr\Http\Message\RequestInterface;

class AmznSPAHttp
{
    private PendingRequest $http;

    private bool $retried = false;

    public function __construct(
        private AmznSPAConfig $config,
    ) {
        $this->setupHttp($config->getHttp());
    }

    public function get(string $url): Response
    {
        return $this->call('get', $url);
    }

    private function call(string $method, string $url): Response
    {
        try {
            return $this->http->$method($url);
        } catch (RequestException $e) {
            if (! $this->shouldRefreshToken($e->response->json())) {
                throw $e;
            }
            if (! $this->shouldRetry()) {
                throw $e;
            }

            $this->refreshTokens();

            return $this->call($method, $url);
        }
    }

    private function shouldRefreshToken(array $response): bool
    {
        return Arr::get($response, 'error') === 'expired_token';
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
        $new_tokens = $amzn->oauth->getAccessTokenFromRefreshToken($this->config->getTokens()->refresh_token);

        $this->config->setTokens($new_tokens);
    }

    private function setupHttp(Factory $http): void
    {
        $access_token = $this->config->getTokens()->access_token;
        if (! $access_token) {
            $this->refreshTokens();

            $access_token = $this->config->getTokens()->access_token;
        }

        $this->http = $http->withHeaders([
            'x-amz-access-token' => $access_token,
            'user-agent' => $this->buildUserAgent(),
        ]);

        $this->signRequest($this->config->getMarketplace()->getAwsRegion());
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
}
