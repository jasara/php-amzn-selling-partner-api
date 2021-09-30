<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\DataTransferObjects\AuthTokensDTO;
use Jasara\AmznSPA\DataTransferObjects\GrantlessTokenDTO;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationResourceSpecificationSchema;
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
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
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
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
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
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
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
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setGrantlessToken(new GrantlessTokenDTO(
            access_token: null,
        ));

        $amzn = new AmznSPA($config);
        $amzn->notifications->deleteSubscriptionById('ANY_OFFER_CHANGED', Str::random());

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

    public function testOtherExceptionThrown()
    {
        $this->expectException(\Exception::class);

        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/invalid-client'), 401),
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
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
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
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
                ->push($this->loadHttpStub('errors/token-expired'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->createDestination(Str::random(), new DestinationResourceSpecificationSchema());
    }

    public function testInvalidInputResponseReturned()
    {
        $http = new Factory(new HttpEventHandler);
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/create-inbound-shipment-plan-invalid-input'), 400),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $response = $amzn->fulfillment_inbound->createInboundShipmentPlan($this->setupInboundShipmentPlanRequest());

        $this->assertInstanceOf(CreateInboundShipmentPlanResponse::class, $response);
        $this->assertNotNull($response->errors);
        $this->assertCount(1, $response->errors);
        $this->assertEquals('InvalidInput', $response->errors->first()->code);
    }

    /**
     * @group external
     * An actual API call is required here, in order to test the request signing and test endpoints.
     */
    public function testSetupHttp()
    {
        $this->expectException(RequestException::class);

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            lwa_refresh_token: Str::random(),
            lwa_access_token: Str::random(),
            aws_access_key: Str::random(),
            aws_secret_key: Str::random(),
            lwa_client_id: Str::random(),
            lwa_client_secret: Str::random(),
            use_test_endpoints: true,
        );

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }
}
