<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DTOs\AuthTokensDTO;
use Jasara\AmznSPA\DTOs\GrantlessTokenDTO;
use Jasara\AmznSPA\DTOs\Schemas\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\HttpEventHandler;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\AmznSPAHttp
 */
class AmznSPAHttpTest extends UnitTestCase
{
    public function testRefreshToken()
    {
        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/token-expired'), 403)
                ->push($this->loadHttpStub('auth/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $config->getTokens()->access_token);
    }

    public function testRefreshGrantlessToken()
    {
        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/token-expired'), 403)
                ->push($this->loadHttpStub('auth/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscriptionById('ANY_OFFER_CHANGED', Str::random());

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $config->getGrantlessToken()->access_token);
    }

    public function testGetTokenIfNotSet()
    {
        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('auth/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setTokens(new AuthTokensDTO(
            refresh_token: Str::random(),
        ));

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $config->getTokens()->access_token);
    }

    public function testGetGrantlessTokenIfNotSet()
    {
        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('auth/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setGrantlessToken(new GrantlessTokenDTO(
            access_token: null,
        ));

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscriptionById('ANY_OFFER_CHANGED', Str::random());

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $config->getGrantlessToken()->access_token);
    }

    public function testOtherErrorNotRetried()
    {
        $this->expectException(RequestException::class);

        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/invalid-client'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }

    public function testRefreshTokenFails()
    {
        $this->expectException(RequestException::class);

        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/token-expired'), 403)
                ->push($this->loadHttpStub('auth/get-tokens'), 200)
                ->push($this->loadHttpStub('errors/token-expired'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->createSubscription('ANY_OFFER_CHANGED');
    }

    public function testRefreshGrantlessTokenFails()
    {
        $this->expectException(RequestException::class);

        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/token-expired'), 403)
                ->push($this->loadHttpStub('auth/get-tokens'), 200)
                ->push($this->loadHttpStub('errors/token-expired'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->createDestination(Str::random(), new DestinationResourceSpecificationSchema());
    }

    /**
     * @group external
     * An actual API call is required here, in order to test the request signing and test endpoints.
     */
    public function testSetupHttp()
    {
        $this->expectException(RequestException::class);

        $config = $this->setupSandboxConfig();

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }
}
