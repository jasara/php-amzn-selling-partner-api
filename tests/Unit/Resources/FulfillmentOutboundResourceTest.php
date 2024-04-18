<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\CreateFulfillmentOrderRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\CreateFulfillmentReturnRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\GetFulfillmentPreviewRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\UpdateFulfillmentOrderRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CancelFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CreateFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CreateFulfillmentReturnResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFeatureInventoryResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFeatureSkuResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFeaturesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFulfillmentPreviewResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetPackageTrackingDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\ListAllFulfillmentOrdersResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\ListReturnReasonCodesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\UpdateFulfillmentOrderResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(\Jasara\AmznSPA\Resources\FulfillmentOutboundResource::class)]
#[CoversClass(\Jasara\AmznSPA\Data\Requests\BaseRequest::class)]
class FulfillmentOutboundResourceTest extends UnitTestCase
{
    public function testGetFulfillmentPreview()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-fulfillment-preview');

        $request = GetFulfillmentPreviewRequest::from(
            marketplace_id: 'ATVPDKIKX0DER',
            address: $this->setupShippingAddress(),
            items: [
                [
                    'seller_sku' => 'PSMM-TEST-SKU-Jan-21_19_39_23-0788',
                    'seller_fulfillment_order_item_id' => 'OrderItemID2',
                    'quantity' => 1,
                ],
            ],
            shipping_speed_categories: ['Standard'],
            feature_constraints: [
                [
                    'feature_name' => 'BLANK_BOX',
                    'feature_fulfillment_policy' => 'Required',
                ],
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->getFulfillmentPreview($request);

        $this->assertInstanceOf(GetFulfillmentPreviewResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders/preview', $request->url());

            return true;
        });
    }

    public function testListAllFulfillmentOrders()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/list-all-fulfillment-orders');

        $queryStartDate = CarbonImmutable::now()->toDateString();
        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->listAllFulfillmentOrders(CarbonImmutable::now());

        $this->assertInstanceOf(ListAllFulfillmentOrdersResponse::class, $response);

        $http->assertSent(function (Request $request) use ($queryStartDate) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders?queryStartDate=' . $queryStartDate, $request->url());

            return true;
        });
    }

    public function testCreateFulfillmentOrder()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('empty');

        $request = CreateFulfillmentOrderRequest::from(
            marketplace_id: 'ATVPDKIKX0DER',
            seller_fulfillment_order_id: Str::random(),
            displayable_order_id: Str::random(),
            displayable_order_date: CarbonImmutable::now(),
            displayable_order_comment: Str::random(),
            shipping_speed_category: 'Expedited',
            destination_address: $this->setupAddress(),
            fulfillment_action: 'Hold',
            fulfillment_policy: 'fulfillment_policy',
            cod_settings: [
                'is_cod_required' => false,
                'cod_charge' => [
                    'currency_code' => 'USD',
                    'value' => '10.00',
                ],
            ],
            items: [
                [
                    'seller_sku' => 'PSMM-TEST-SKU-Jan-21_19_39_23-0788',
                    'seller_fulfillment_order_item_id' => 'OrderItemID2',
                    'quantity' => 1,
                ],
            ],
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->createFulfillmentOrder($request);

        $this->assertInstanceOf(CreateFulfillmentOrderResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders', $request->url());

            return true;
        });
    }

    public function testGetPackageTrackingDetails()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-package-tracking-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->getPackageTrackingDetails(87987979);

        $this->assertInstanceOf(GetPackageTrackingDetailsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/tracking', $request->url());

            return true;
        });
    }

    public function testListReturnReasonCodes()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/list-return-reason-codes');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->listReturnReasonCodes(
            marketplace_id: 'ATVPDKIKX0DER',
            seller_sku: '',
            seller_fulfillment_order_id: '',
            language: '',
        );

        $this->assertInstanceOf(ListReturnReasonCodesResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/returnReasonCodes?MarketplaceId=ATVPDKIKX0DER', $request->url());

            return true;
        });
    }

    public function testCreateFulfillmentReturn()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/create-fulfillment-return');

        $seller_fulfillment_order_id = Str::random();
        $request = CreateFulfillmentReturnRequest::from(
            items: [
                'item' => [
                    'seller_return_item_id' => 'testReturn11',
                    'seller_fulfillment_order_item_id' => 'OrderItemID2',
                    'amazon_shipment_id' => 'D4yZjWZVN',
                    'return_comment' => 'TestReturn',
                    'return_reason_code' => 'UNKNOWN_OTHER_REASON',
                ],
            ]
        );
        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->createFulfillmentReturn($seller_fulfillment_order_id, $request);

        $this->assertInstanceOf(CreateFulfillmentReturnResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_fulfillment_order_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders/' . $seller_fulfillment_order_id . '/return', urldecode($request->url()));

            return true;
        });
    }

    public function testGetFulfillmentOrder()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-fulfillment-order');

        $seller_fulfillment_order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->getFulfillmentOrder($seller_fulfillment_order_id);

        $this->assertInstanceOf(GetFulfillmentOrderResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_fulfillment_order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders/' . $seller_fulfillment_order_id, $request->url());

            return true;
        });
    }

    public function testUpdateFulfillmentOrder()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('empty');

        $seller_fulfillment_order_id = Str::random();
        $request = new UpdateFulfillmentOrderRequest(
            marketplace_id: 'ATVPDKIKX0DER',
            destination_address: $this->setupShippingAddress(),
        );
        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->updateFulfillmentOrder($request, $seller_fulfillment_order_id);

        $this->assertInstanceOf(UpdateFulfillmentOrderResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_fulfillment_order_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders/' . $seller_fulfillment_order_id, urldecode($request->url()));

            return true;
        });
    }

    public function testCancelFulfillmentOrder()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('empty');

        $seller_fulfillment_order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->cancelFulfillmentOrder($seller_fulfillment_order_id);

        $this->assertInstanceOf(CancelFulfillmentOrderResponse::class, $response);

        $http->assertSent(function (Request $request) use ($seller_fulfillment_order_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/fulfillmentOrders/' . $seller_fulfillment_order_id . '/cancel', urldecode($request->url()));

            return true;
        });
    }

    public function testGetFeatures()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-features');

        $marketplace_id = 'ATVPDKIKX0DER';

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->getFeatures($marketplace_id);

        $this->assertInstanceOf(GetFeaturesResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/features', $request->url());

            return true;
        });
    }

    public function testGetFeatureInventory()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-feature-inventory');

        $marketplace_id = 'ATVPDKIKX0DER';
        $feature_name = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->getFeatureInventory($marketplace_id, $feature_name);

        $this->assertInstanceOf(GetFeatureInventoryResponse::class, $response);

        $http->assertSent(function (Request $request) use ($feature_name) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/features/inventory/' . $feature_name, $request->url());

            return true;
        });
    }

    public function testGetFeatureSku()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-feature-sku');

        $marketplace_id = 'ATVPDKIKX0DER';
        $feature_name = Str::random();
        $seller_sku = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_outbound->getFeatureSku($marketplace_id, $feature_name, $seller_sku);

        $this->assertInstanceOf(GetFeatureSkuResponse::class, $response);

        $http->assertSent(function (Request $request) use ($feature_name, $seller_sku) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/fba/outbound/2020-07-01/features/inventory/' . $feature_name . '/' . $seller_sku, $request->url());

            return true;
        });
    }
}
