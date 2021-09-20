<?php

namespace Jasara\AmznSPA\Traits;

use Aws\Credentials\Credentials;
use Aws\Signature\SignatureV4;
use Carbon\Carbon;
use GuzzleHttp\Middleware;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\PendingRequest;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\DTOs\ApplicationKeysDTO;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Psr\Http\Message\RequestInterface;

trait CallsAmazon
{
    private function setupHttp(Factory $http, Marketplace $marketplace, AuthTokensDTO $tokens, ApplicationKeysDTO $application_keys)
    {
        // $amz_date = Carbon::now()->format('Ymd\THis\Z');

        $http = $http->withHeaders([
            'x-amz-access-token' => $tokens->access_token,
            'user-agent' => $this->buildUserAgent(),
        ]);

        $http = $this->signRequest($http, $application_keys, $marketplace->getAwsRegion());

        return $http;
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

    private function signRequest(PendingRequest $http, ApplicationKeysDTO $application_keys, string $aws_region): PendingRequest
    {
        $middleware = Middleware::mapRequest(function (RequestInterface $request) use ($application_keys, $aws_region) {
            $signer = new SignatureV4('execute-api', $aws_region);
            $credentials = new Credentials($application_keys->aws_access_key, $application_keys->aws_secret_key);

            $signed_request = $signer->signRequest($request, $credentials);

            return $request->withHeader('Authorization', $signed_request->getHeader('Authorization'))
                ->withHeader('X-Amz-Date', $signed_request->getHeader('X-Amz-Date'));
        });

        return $http->withMiddleware($middleware);
    }
}
