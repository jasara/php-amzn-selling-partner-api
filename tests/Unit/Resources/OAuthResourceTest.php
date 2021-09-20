<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Constants\Marketplace;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @coversDefaultClass \Jasara\AmznSPA\Resources\OAuthResource
 */
class OAuthResourceTest extends UnitTestCase
{
    /**
     * @dataProvider marketplaces
     * @covers ::getAuthUrl()
     * @covers ::getBaseUrlFromMarketplace()
     */
    public function testAuthUrlGenerated(Marketplace $marketplace)
    {
        $amzn = new AmznSPA($this->setupMinimalConfig($marketplace->getIdentifier()));
        $url = $amzn->oauth->getAuthUrl();

        $this->assertEquals($marketplace->getBaseUrl() . '/apps/authorize/consent', $url);
    }

    /**
     * @dataProvider marketplaces
     * @covers ::getAuthUrl()
     * @covers ::getBaseUrlFromMarketplace()
     */
    public function testAuthUrlGeneratedWithStateAndRedirectUrl(Marketplace $marketplace)
    {
        $state = Str::random();
        $redirect_url = 'https://test.com/' . $state;

        $amzn = new AmznSPA($this->setupMinimalConfig($marketplace->getIdentifier()));
        $url = $amzn->oauth->getAuthUrl($redirect_url, $state);

        $this->assertEquals($marketplace->getBaseUrl() . '/apps/authorize/consent?redirect_url=https%3A%2F%2Ftest.com%2F' . $state . '&state=' . $state, $url);
    }

    /**
     * @covers ::isRedirectValid()
     * @covers ::getTokensFromRedirect()
     */
    public function testStateDoesNotMatch()
    {
        $this->expectException(AmznSPAException::class);
        $this->expectExceptionMessage('State returned from Amazon does not match the original state');

        $amzn = new AmznSPA($this->setupMinimalConfig());
        $amzn->oauth->getTokensFromRedirect(Str::random(), [
            'state' => Str::random(),
            'spapi_oauth_code' => Str::random(),
        ]);
    }

    /**
     * @covers ::__construct()
     * @covers ::getTokensFromRedirect()
     * @covers ::callGetTokens()
     * @covers ::isRedirectValid()
     */
    public function testGetTokensFromRedirect()
    {
        $state = Str::random();
        $spapi_oauth_code = Str::random();

        list($config, $http) = $this->setupConfigWithFakeHttp('oauth/get-tokens');

        $amzn = new AmznSPA($config);
        $tokens = $amzn->oauth->getTokensFromRedirect($state, [
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

    /**
     * @covers ::callGetTokens
     */
    public function testGetTokensFromRedirectError()
    {
        $this->expectException(AuthenticationException::class);

        $state = Str::random();
        $spapi_oauth_code = Str::random();

        list($config) = $this->setupConfigWithFakeHttp('errors/invalid-client', 401);

        $amzn = new AmznSPA($config);
        $amzn->oauth->getTokensFromRedirect($state, [
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
