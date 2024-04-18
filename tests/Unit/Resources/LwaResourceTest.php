<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Data\AuthTokens;
use Jasara\AmznSPA\Data\GrantlessToken;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Tests\Setup\CallbackTestException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(\Jasara\AmznSPA\Resources\LwaResource::class)]
#[CoversClass(AuthenticationException::class)]
class LwaResourceTest extends UnitTestCase
{
    #[DataProvider('marketplaces')]
    public function testAuthUrlGenerated(Marketplace $marketplace)
    {
        $amzn = new AmznSPA($config = $this->setupMinimalConfig($marketplace->getIdentifier()));
        $url = $amzn->lwa->getAuthUrl();

        $this->assertEquals($marketplace->getBaseUrl().'/apps/authorize/consent?redirect_url='.$config->getRedirectUrl(), $url);
    }

    #[DataProvider('marketplaces')]
    public function testAuthUrlGeneratedWithStateAndRedirectUrl(Marketplace $marketplace)
    {
        $state = Str::random();

        $amzn = new AmznSPA($config = $this->setupMinimalConfig($marketplace->getIdentifier()));
        $url = $amzn->lwa->getAuthUrl($state);

        $this->assertEquals($marketplace->getBaseUrl().'/apps/authorize/consent?redirect_url='.$config->getRedirectUrl().'&state='.$state, $url);
    }

    public function testStateDoesNotMatch()
    {
        $this->expectException(AmznSPAException::class);
        $this->expectExceptionMessage('State returned from Amazon does not match the original state');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->lwa->getTokensFromRedirect(Str::random(), [
            'state' => Str::random(),
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testGetTokensFromRedirect()
    {
        $state = Str::random();
        $spapi_oauth_code = Str::random();

        [$config, $http] = $this->setupConfigWithFakeHttp('lwa/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => $spapi_oauth_code,
        ]);

        $this->assertInstanceOf(AuthTokens::class, $tokens);
        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $tokens->access_token);
        $this->assertInstanceOf(CarbonImmutable::class, $tokens->expires_at);
        $this->assertEqualsWithDelta(CarbonImmutable::now()->addSeconds(3600), $tokens->expires_at, 5);
        $this->assertEquals('Atzr|IQEBLzAtAhexamplewVz2Nn6f2y-tpJX2DeX', $tokens->refresh_token);

        $http->assertSent(function (Request $request) use ($spapi_oauth_code, $config) {
            $this->assertEquals('authorization_code', Arr::get($request, 'grant_type'));
            $this->assertEquals($spapi_oauth_code, Arr::get($request, 'code'));
            $this->assertEquals($config->getRedirectUrl(), Arr::get($request, 'redirect_uri'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_id, Arr::get($request, 'client_id'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_secret, Arr::get($request, 'client_secret'));

            return true;
        });
    }

    public function testGetTokensFromAuthorizationCode()
    {
        $auth_code = Str::random();

        [$config, $http] = $this->setupConfigWithFakeHttp('lwa/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getTokensFromAuthorizationCode($auth_code);

        $this->assertInstanceOf(AuthTokens::class, $tokens);
        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $tokens->access_token);
        $this->assertInstanceOf(CarbonImmutable::class, $tokens->expires_at);
        $this->assertEqualsWithDelta(CarbonImmutable::now()->addSeconds(3600), $tokens->expires_at, 5);
        $this->assertEquals('Atzr|IQEBLzAtAhexamplewVz2Nn6f2y-tpJX2DeX', $tokens->refresh_token);

        $http->assertSent(function (Request $request) use ($auth_code, $config) {
            $this->assertEquals('authorization_code', Arr::get($request, 'grant_type'));
            $this->assertEquals($auth_code, Arr::get($request, 'code'));
            $this->assertEquals($config->getRedirectUrl(), Arr::get($request, 'redirect_uri'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_id, Arr::get($request, 'client_id'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_secret, Arr::get($request, 'client_secret'));

            return true;
        });
    }

    public function testGetAccessTokenFromRefreshToken()
    {
        $refresh_token = Str::random();

        [$config, $http] = $this->setupConfigWithFakeHttp('lwa/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);

        $this->assertInstanceOf(AuthTokens::class, $tokens);
        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $tokens->access_token);
        $this->assertInstanceOf(CarbonImmutable::class, $tokens->expires_at);
        $this->assertEqualsWithDelta(CarbonImmutable::now()->addSeconds(3600), $tokens->expires_at, 5);
        $this->assertEquals('Atzr|IQEBLzAtAhexamplewVz2Nn6f2y-tpJX2DeX', $tokens->refresh_token);

        $http->assertSent(function (Request $request) use ($refresh_token, $config) {
            $this->assertEquals('refresh_token', Arr::get($request, 'grant_type'));
            $this->assertEquals($refresh_token, Arr::get($request, 'refresh_token'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_id, Arr::get($request, 'client_id'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_secret, Arr::get($request, 'client_secret'));

            return true;
        });
    }

    public function testGetGrantlessAccessToken()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('lwa/get-tokens');
        $scope = Str::random();

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getGrantlessAccessToken($scope);

        $this->assertInstanceOf(GrantlessToken::class, $tokens);
        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $tokens->access_token);
        $this->assertInstanceOf(CarbonImmutable::class, $tokens->expires_at);
        $this->assertEqualsWithDelta(CarbonImmutable::now()->addSeconds(3600), $tokens->expires_at, 5);

        $http->assertSent(function (Request $request) use ($scope, $config) {
            $this->assertEquals('client_credentials', Arr::get($request, 'grant_type'));
            $this->assertEquals($scope, Arr::get($request, 'scope'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_id, Arr::get($request, 'client_id'));
            $this->assertEquals($config->getApplicationKeys()->lwa_client_secret, Arr::get($request, 'client_secret'));

            return true;
        });
    }

    public function testGetTokensFromRedirectError()
    {
        $this->expectException(AuthenticationException::class);

        $state = Str::random();
        $spapi_oauth_code = Str::random();

        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => $spapi_oauth_code,
        ]);
    }

    public function testSaveTokensUsingCallback()
    {
        $refresh_token = Str::random();

        $callback = new class() {
            public mixed $tokens;

            public function __invoke($tokens)
            {
                $this->tokens = $tokens;
            }
        };

        [$config, $http] = $this->setupConfigWithFakeHttp('lwa/get-tokens');
        $config->setSaveLwaTokensCallback(\Closure::fromCallable([$callback, '__invoke']));

        $amzn = new AmznSPA($config);
        $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $callback->tokens->access_token);
        $this->assertInstanceOf(CarbonImmutable::class, $callback->tokens->expires_at);
        $this->assertEqualsWithDelta(CarbonImmutable::now()->addSeconds(3600), $callback->tokens->expires_at, 5);
        $this->assertEquals('Atzr|IQEBLzAtAhexamplewVz2Nn6f2y-tpJX2DeX', $callback->tokens->refresh_token);
    }

    public function testHandle401()
    {
        $this->expectException(AuthenticationException::class);

        $state = Str::random();

        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testUnauthorized()
    {
        $this->expectException(AuthenticationException::class);
        $this->expectExceptionMessage('Access to requested resource is denied.');

        $state = Str::random();

        [$config] = $this->setupConfigWithFakeHttp('errors/unauthorized', 401);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    public function testErrorStatusWithNoErrorData()
    {
        $this->expectException(AuthenticationException::class);
        $this->expectExceptionMessage('Description: Client authentication failed');

        $refresh_token = Str::random();

        [$config] = $this->setupConfigWithFakeHttp('errors/no-error-in-data', 401);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);
    }

    public function testErrorStatusWithNoErrorDescriptionData()
    {
        $this->expectException(AuthenticationException::class);
        $this->expectExceptionMessage('Error: invalid_client');

        $state = Str::random();

        [$config] = $this->setupConfigWithFakeHttp('errors/no-error-description-in-data', 401);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getGrantlessAccessToken('notifications');
    }

    public function testAuthenticationExceptionCallback()
    {
        $this->expectException(AuthenticationException::class);

        $refresh_token = Str::random();

        $callback = new class() {
            public mixed $response;

            public function __invoke($response)
            {
                $this->response = $response;
            }
        };

        [$config] = $this->setupConfigWithFakeHttp('errors/no-error-description-in-data', 401);
        $config->setAuthenticationExceptionCallback(\Closure::fromCallable([$callback, '__invoke']));

        $amzn = new AmznSPA($config);
        $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);

        $this->assertEquals('invalid_client', $callback->response->json()['error']);
    }

    public function testNon401Error()
    {
        $this->expectException(RequestException::class);

        $state = Str::random();

        [$config] = $this->setupConfigWithFakeHttp('errors/no-error-description-in-data', 400);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getGrantlessAccessToken('notifications');
    }

    public static function marketplaces(): array
    {
        $marketplaces = [];
        $marketplaces_list = MarketplacesList::all()->toArray();
        foreach ($marketplaces_list as $marketplace) {
            $marketplaces[] = [$marketplace];
        }

        return $marketplaces;
    }

    public function testInvalidGrantThrowsAuthenticationException()
    {
        $this->expectException(AuthenticationException::class);

        $refresh_token = Str::random();

        /** @var AmznSPAConfig $config */
        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-grant', 400);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);
    }

    public function testResponseInvalidGrantCallbackIsCalled()
    {
        $this->expectException(CallbackTestException::class);

        $refresh_token = Str::random();

        $callback = function () {
            throw new CallbackTestException();
        };

        /** @var AmznSPAConfig $config */
        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-grant', 400);
        $config->setResponseCallback(\Closure::fromCallable($callback));

        $amzn = new AmznSPA($config);
        $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);
    }
}
