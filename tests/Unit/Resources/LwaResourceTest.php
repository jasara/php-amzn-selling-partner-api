<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DataTransferObjects\AuthTokensDTO;
use Jasara\AmznSPA\DataTransferObjects\GrantlessTokenDTO;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\LwaResource
 */
class LwaResourceTest extends UnitTestCase
{
    /**
     * @dataProvider marketplaces
     */
    public function testAuthUrlGenerated(Marketplace $marketplace)
    {
        $amzn = new AmznSPA($config = $this->setupMinimalConfig($marketplace->getIdentifier()));
        $url = $amzn->lwa->getAuthUrl();

        $this->assertEquals($marketplace->getBaseUrl() . '/apps/authorize/consent?redirect_url=' . $config->getRedirectUrl(), $url);
    }

    /**
     * @dataProvider marketplaces
     */
    public function testAuthUrlGeneratedWithStateAndRedirectUrl(Marketplace $marketplace)
    {
        $state = Str::random();

        $amzn = new AmznSPA($config = $this->setupMinimalConfig($marketplace->getIdentifier()));
        $url = $amzn->lwa->getAuthUrl($state);

        $this->assertEquals($marketplace->getBaseUrl() . '/apps/authorize/consent?redirect_url=' . $config->getRedirectUrl() . '&state=' . $state, $url);
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

        list($config, $http) = $this->setupConfigWithFakeHttp('lwa/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => $spapi_oauth_code,
        ]);

        $this->assertInstanceOf(AuthTokensDTO::class, $tokens);
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

        list($config, $http) = $this->setupConfigWithFakeHttp('lwa/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getTokensFromAuthorizationCode($auth_code);

        $this->assertInstanceOf(AuthTokensDTO::class, $tokens);
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

        list($config, $http) = $this->setupConfigWithFakeHttp('lwa/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getAccessTokenFromRefreshToken($refresh_token);

        $this->assertInstanceOf(AuthTokensDTO::class, $tokens);
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
        list($config, $http) = $this->setupConfigWithFakeHttp('lwa/get-tokens');
        $scope = Str::random();

        $amzn = new AmznSPA($config);
        $tokens = $amzn->lwa->getGrantlessAccessToken($scope);

        $this->assertInstanceOf(GrantlessTokenDTO::class, $tokens);
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

        list($config) = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->lwa->getTokensFromRedirect($state, [
            'state' => $state,
            'spapi_oauth_code' => $spapi_oauth_code,
        ]);
    }

    public function marketplaces(): array
    {
        $marketplaces = [];
        $marketplaces_list = MarketplacesList::all()->toArray();
        foreach ($marketplaces_list as $marketplace) {
            $marketplaces[] = [$marketplace];
        }

        return $marketplaces;
    }
}
