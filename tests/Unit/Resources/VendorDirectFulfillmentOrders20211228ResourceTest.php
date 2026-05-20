<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders20211228\GetOrderResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders20211228\GetOrdersResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders20211228\SubmitAcknowledgementResponse;
use Jasara\AmznSPA\Resources\VendorDirectFulfillmentOrders20211228Resource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(VendorDirectFulfillmentOrders20211228Resource::class)]
class VendorDirectFulfillmentOrders20211228ResourceTest extends UnitTestCase
{
    public function test_get_orders(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-orders20211228/get-orders');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_orders20211228->getOrders(
            created_after: 'createdAfterValue',
            created_before: 'createdBeforeValue',
            ship_from_party_id: 'shipFromPartyIdValue',
            status: 'statusValue',
            limit: 10,
            sort_order: 'sortOrderValue',
            next_token: 'nextTokenValue',
            include_details: 'includeDetailsValue',
        );

        $this->assertInstanceOf(GetOrdersResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/orders/2021-12-28/purchaseOrders?createdAfter=createdAfterValue&createdBefore=createdBeforeValue&shipFromPartyId=shipFromPartyIdValue&status=statusValue&limit=10&sortOrder=sortOrderValue&nextToken=nextTokenValue&includeDetails=includeDetailsValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_get_order(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-orders20211228/get-order');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_orders20211228->getOrder(
            purchase_order_number: 'purchaseOrderNumberValue',
        );

        $this->assertInstanceOf(GetOrderResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/orders/2021-12-28/purchaseOrders/purchaseOrderNumberValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_submit_acknowledgement(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('vendor-direct-fulfillment-orders20211228/submit-acknowledgement');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->vendor_direct_fulfillment_orders20211228->submitAcknowledgement(
            request_body: [
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ],
        );

        $this->assertInstanceOf(SubmitAcknowledgementResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/vendor/directFulfillment/orders/2021-12-28/acknowledgements', urldecode($request->url()));
            $this->assertEquals([
                'payload' => [
                    'testValue' => 'request-value',
                ],
            ], $request->data());

            return true;
        });
    }
}
