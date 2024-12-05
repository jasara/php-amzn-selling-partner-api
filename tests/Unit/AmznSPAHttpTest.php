<?php

namespace Jasara\AmznSPA\Tests\Unit\Traits;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\Factory;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\AmznSPAConfig;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Data\AuthTokens;
use Jasara\AmznSPA\Data\GrantlessToken;
use Jasara\AmznSPA\Data\Proxy;
use Jasara\AmznSPA\Data\Requests\ListingsItems\ListingsItemPatchRequest;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Responses\CatalogItems\v20220401\GetCatalogItemResponse;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\Data\Responses\MerchantFulfillment\GetShipmentResponse;
use Jasara\AmznSPA\Data\Responses\Reports\GetReportDocumentResponse;
use Jasara\AmznSPA\Data\RestrictedDataToken;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationResourceSpecificationSchema;
use Jasara\AmznSPA\Exceptions\AmznSPAException;
use Jasara\AmznSPA\Exceptions\AuthenticationException;
use Jasara\AmznSPA\Exceptions\GrantlessAuthenticationException;
use Jasara\AmznSPA\Exceptions\InvalidParametersException;
use Jasara\AmznSPA\Exceptions\RateLimitException;
use Jasara\AmznSPA\HttpLoggerMiddleware;
use Jasara\AmznSPA\Tests\Setup\CallbackTestException;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

#[CoversClass(AmznSPAHttp::class)]
#[CoversClass(AuthenticationException::class)]
#[CoversClass(GrantlessAuthenticationException::class)]
#[CoversClass(HttpLoggerMiddleware::class)]
class AmznSPAHttpTest extends UnitTestCase
{
    public function testRefreshToken()
    {
        $http = new Factory();
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

    public function testRefreshTokenWithRefreshTokenSet()
    {
        $this->expectExceptionMessage('Refresh token is not set');

        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/token-expired'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setTokens(AuthTokens::from(
            refresh_token: null,
        ));

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');
    }

    public function testInvalidGrantRefreshTokenIsAttempted()
    {
        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/invalid-grant'), 400)
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
        $http = new Factory();
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

    public function testRefreshRestrictedDataToken()
    {
        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('tokens/create-restricted-data-token'), 200)
                ->push($this->loadHttpStub('merchant-fulfillment/get-shipment'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $response = $amzn->merchant_fulfillment->getShipment(Str::random());

        $this->assertInstanceOf(GetShipmentResponse::class, $response);

        $this->assertEquals('Atz.sprdt|IQEBLjAsAhRmHjNgHpi0U-Dme37rR6CuUpSR', $config->getRestrictedDataToken()->access_token);
    }

    public function testDontRefreshRestrictedDataTokenDueToConfigSetting()
    {
        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('merchant-fulfillment/get-shipment'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setGetRdtTokens(false);

        $amzn = new AmznSPA($config);
        $response = $amzn->merchant_fulfillment->getShipment(Str::random());

        $this->assertInstanceOf(GetShipmentResponse::class, $response);
    }

    public function testDontRefreshRestrictedDataTokenDueToProperty()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('reports/get-report-document');

        $report_document_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->reports->getReportDocument($report_document_id);

        $this->assertInstanceOf(GetReportDocumentResponse::class, $response);
    }

    public function testRefreshesRestrictedTokenIfPathIsNotCompatible()
    {
        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('tokens/create-restricted-data-token'), 200)
                ->push($this->loadHttpStub('merchant-fulfillment/get-shipment'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setRestrictedDataToken(new RestrictedDataToken(
            access_token: Str::random(),
            expires_at: 3600,
            path: Str::random(),
        ));

        $amzn = new AmznSPA($config);
        $response = $amzn->merchant_fulfillment->getShipment(Str::random());

        $this->assertInstanceOf(GetShipmentResponse::class, $response);

        $this->assertEquals('Atz.sprdt|IQEBLjAsAhRmHjNgHpi0U-Dme37rR6CuUpSR', $config->getRestrictedDataToken()->access_token);

        $http->assertSequencesAreEmpty();
    }

    public function testExceptionIfCantGetRestrictedToken()
    {
        $this->expectException(AmznSPAException::class);
        $this->expectExceptionMessage('Application does not have access to one or more requested data elements: [shippingAddress]');

        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/restricted-no-access'), 400),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->orders->getOrders(marketplace_ids: ['ATVPDKIKX0DER']);
    }

    public function testGetTokenIfNotSet()
    {
        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setTokens(AuthTokens::from(
            refresh_token: Str::random(),
        ));

        $amzn = new AmznSPA($config);
        $amzn->notifications->getSubscription('ANY_OFFER_CHANGED');

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $config->getTokens()->access_token);
    }

    public function testGetGrantlessTokenIfNotSet()
    {
        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
                ->push($this->loadHttpStub('notifications/get-subscription'), 200),
        ]);

        $config = $this->setupMinimalConfig(null, $http);
        $config->setGrantlessToken(new GrantlessToken(
            access_token: null,
            expires_at: 0,
        ));

        $amzn = new AmznSPA($config);
        $amzn->notifications->deleteSubscriptionById('ANY_OFFER_CHANGED', Str::random());

        $this->assertEquals('Atza|IQEBLjAsAexampleHpi0U-Dme37rR6CuUpSR', $config->getGrantlessToken()->access_token);
    }

    public function testOtherErrorNotRetried()
    {
        $this->expectException(RequestException::class);

        $http = new Factory();
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

        $http = new Factory();
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

        $http = new Factory();
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

        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/token-expired'), 403)
                ->push($this->loadHttpStub('lwa/get-tokens'), 200)
                ->push($this->loadHttpStub('errors/token-expired'), 403),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->notifications->createDestination(Str::random(), DestinationResourceSpecificationSchema::from());
    }

    public function testInvalidInputResponseReturned()
    {
        $http = new Factory();
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

    public function testInvalidResponseNotReturned()
    {
        $this->expectException(RequestException::class);

        $http = new Factory();
        $http->fake([
            '*' => $http->sequence()
                ->push($this->loadHttpStub('errors/no-error-in-data'), 400),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_inbound->createInboundShipmentPlan($this->setupInboundShipmentPlanRequest());
    }

    public function testMetadata()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('errors/invalid-party-id');

        $amzn = new AmznSPA($config);
        $response = $amzn->catalog_items20220401->getCatalogItem('ASIN', ['ATVPDKIKX0DER']);

        $this->assertInstanceOf(GetCatalogItemResponse::class, $response);
        $this->assertNotNull($response->metadata);
        $this->assertNotNull($response->metadata->amzn_request_id);
        $this->assertNotNull($response->metadata->jasara_notes);
        $this->assertStringContainsString('The Seller ID for this Seller is not valid.', $response->metadata->jasara_notes);
    }

    public function testDelete()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('errors/invalid-client');

        $feed_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->feeds->cancelFeed($feed_id);

        $this->assertInstanceOf(BaseResponse::class, $response);
        $this->assertNotNull($response->metadata);
        $this->assertNotNull($response->metadata->amzn_request_id);
    }

    public function testUnauthorized()
    {
        $this->expectException(AuthenticationException::class);
        $this->expectExceptionMessage('Access to requested resource is denied.');

        [$config] = $this->setupConfigWithFakeHttp('errors/unauthorized', 403);

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_inbound->getPrepInstructions('US', [Str::random()]);
    }

    public function testUnauthorizedGrantless()
    {
        $this->expectException(GrantlessAuthenticationException::class);
        $this->expectExceptionMessage('Access to requested resource is denied.');

        [$config] = $this->setupConfigWithFakeHttp('errors/unauthorized', 403);

        $amzn = new AmznSPA($config);
        $amzn->notifications->deleteDestination(Str::random());
    }

    public function testSetRestrictedDataElements()
    {
        [$config, $http] = $this->setupConfigWithFakeHttp(['tokens/create-restricted-data-token', 'orders/get-orders']);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $amzn->orders->getOrders(
            marketplace_ids: ['ATVPDKIKX0DER'],
        );

        $request_validation = [
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders?MarketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));

                return true;
            },
        ];

        $http->assertSentInOrder($request_validation);
    }

    public function testSetProxyHeaders()
    {
        $http = $this->fakeHttpStub(['orders/get-orders']);

        $proxy_auth_token = Str::random();
        $proxy = new Proxy(
            url: 'https://www.example.com',
            headers: [
                'Authorization' => "Bearer {$proxy_auth_token}",
                'X-Marketplace-Id' => 'ATVPDKIKX0DER',
            ],
        );

        $config = $this->setupMinimalProxyConfig($proxy, null, $http);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $amzn->orders->getOrders(
            marketplace_ids: ['ATVPDKIKX0DER'],
        );

        $request_validation = [
            function (Request $request) use ($proxy_auth_token) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://www.example.com/orders/v0/orders?MarketplaceIds=ATVPDKIKX0DER', urldecode($request->url()));
                $this->assertEquals("Bearer {$proxy_auth_token}", $request->header('Authorization')[0]);
                $this->assertEquals('ATVPDKIKX0DER', $request->header('X-Marketplace-Id')[0]);

                return true;
            },
        ];

        $http->assertSentInOrder($request_validation);
    }

    public function testInvalidPartyId()
    {
        $this->expectException(AuthenticationException::class);
        $this->expectExceptionMessage('Invalid partyId: 12345678 Additional Notes: The Seller ID for this Seller is not valid.');

        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-party-id', 400);

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_inbound->getPrepInstructions('US', [Str::random()]);
    }

    /**
     * An actual live API call is required here, in order to test the request signing and test endpoints.
     */
    #[Group('external')]
    public function testSetupHttp()
    {
        $this->expectException(AuthenticationException::class);

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

        try {
            $amzn->listings_items->getListingsItem(Str::random(), Str::random(), ['ATVPDKIKX0DER']);
        } catch (ConnectionException $e) {
            $this->markTestSkipped('No connection');
        }
    }

    /**
     * An actual live API call is required here, in order to test the request signing and test endpoints.
     */
    #[Group('external')]
    public function testSetupHttpProxy()
    {
        $this->expectException(RequestException::class);

        $config = new AmznSPAConfig(
            marketplace_id: MarketplacesList::allIdentifiers()[rand(0, 15)],
            application_id: Str::random(),
            proxy: new Proxy(
                url: 'https://www.amazon.com',
                headers: [],
            )
        );

        $this->assertNotNull($config->getProxy());

        $amzn = new AmznSPA($config);

        try {
            $amzn->listings_items->getListingsItem(Str::random(), Str::random(), ['ATVPDKIKX0DER']);
        } catch (ConnectionException $e) {
            $this->markTestSkipped('No connection');
        }
    }

    public function testRateLimitExceptionIsThrownIfResponseHasCode429()
    {
        [$config] = $this->setupConfigWithFakeHttp('errors/rate-limit', 429);

        $this->expectException(RateLimitException::class);

        $amzn = new AmznSPA($config);
        $amzn->feeds->cancelFeed('some-feed-id');
    }

    public function testExceptionIsThrownIfResponseHasNoData()
    {
        $this->expectException(RequestException::class);

        $http = new Factory();
        $http->fake([
            '*' => $http->response('', 400),
        ]);

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->listings_items->patchListingsItem(
            Str::random(),
            Str::random(),
            ['ATVPDKIKX0DER'],
            null,
            ListingsItemPatchRequest::from(
                product_type: Str::random(),
                patches: [],
            )
        );
    }

    public function testExceptionIsThrownIfGetRequestHasMultipleSkusAndOneHasAComma()
    {
        $this->expectException(InvalidParametersException::class);
        $this->expectExceptionMessage('You cannot make a request for multiple SKUs when one of those SKUs contains a comma');

        $http = new Factory();

        $config = $this->setupMinimalConfig(null, $http);

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_inbound->getPrepInstructions(
            ship_to_country_code: 'US',
            seller_sku_list: ['NORMAL-SKU', 'SKU WITH, COMMA'],
        );
    }

    public function testResponseCallbackIsCalled()
    {
        $this->expectException(CallbackTestException::class);

        /** @var AmznSPAConfig $config */
        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-grant', 400);

        $response_callback = function () {
            throw new CallbackTestException();
        };
        $config->setResponseCallback($response_callback);

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_outbound->cancelFulfillmentOrder('some-order-id');
    }

    public function testCannotSetResponseThatIsNotBaseResponse()
    {
        $this->expectExceptionMessage('Response class must extend BaseResponse');

        $http = new AmznSPAHttp($this->setupMinimalConfig());
        // @phpstan-ignore-next-line
        $http->responseClass('stdClass');
    }

    public function testReturnsArrayWithNoResponseClassSet()
    {
        [$config] = $this->setupConfigWithFakeHttp('reports/get-report-document');

        $http = new AmznSPAHttp($config);
        $response = $http->get($config->getMarketplace()->getBaseUrl() . '/orders/v0/orders');

        $this->assertIsArray($response);
    }

    public function testErrorResponseEvenIfResponseClassHasRequiredProperties()
    {
        [$config] = $this->setupConfigWithFakeHttp('errors/unauthorized');

        $amzn = new AmznSPA($config);
        $response = $amzn->fulfillment_inbound20240320->listPrepDetails('ATVPDKIKX0DER', ['msku1']);

        $this->assertInstanceOf(ErrorListResponse::class, $response);
        $this->assertEquals($response->errors[0]->message, 'Access to requested resource is denied.');
    }

    public function testThrowsInvalidArgumentExceptionIfResponseHasErrorsInDifferentFormat()
    {
        $this->expectException(InvalidArgumentException::class);

        [$config] = $this->setupConfigWithFakeHttp('errors/invalid-client');

        $amzn = new AmznSPA($config);
        $amzn->fulfillment_inbound20240320->listPrepDetails('ATVPDKIKX0DER', ['msku1']);
    }
}
