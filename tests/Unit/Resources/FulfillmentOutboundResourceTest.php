<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\CreateFulfillmentOrderRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\CreateFulfillmentReturnRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\GetFulfillmentPreviewRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\CreateFulfillmentOrderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\CreateFulfillmentReturnResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFulfillmentPreviewResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetPackageTrackingDetailsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\ListAllFulfillmentOrdersResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\ListReturnReasonCodesResponse;
// CreateFulfillmentOrderRequest      CreateFulfillmentReturnRequest

use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class FulfillmentOutboundResourceTest extends UnitTestCase
{
    public function testGetFulfillmentPreview()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/get-fulfillment-preview');

        $request = new GetFulfillmentPreviewRequest(
            marketplace_id: 'ATVPDKIKX0DER',
            address:$this->setupAddress(),
            items:[
                [
                    'seller_sku'=> 'PSMM-TEST-SKU-Jan-21_19_39_23-0788',
                    'seller_fulfillment_order_item_id'=> 'OrderItemID2',
                    'quantity'=> 1, ],
            ],
            shipping_speed_categories:['Standard'],
            feature_constraints:[
                [
                    'feature_name'=> 'BLANK_BOX',
                    'feature_fulfillment_policy'=> 'Required',
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
        list($config, $http) = $this->setupConfigWithFakeHttp('fulfillment-outbound/create-fulfillment-order');

        $request = new CreateFulfillmentOrderRequest(
            marketplace_id: 'ATVPDKIKX0DER',
            seller_fulfillmen_order_id:Str::random(),
            displayable_order_id:Str::random(),
            displayable_order_date: CarbonImmutable::now(),
            displayable_order_comment:Str::random(),
            shipping_speed_category:'Expedited',
            destination_address:$this->setupAddress(),
            fulfillment_action:'Hold',
            fulfillment_policy:'fulfillment_policy',
            cod_settings:[
                'is_cod_required'=> false,
                'cod_charge'=> [
                    'currency_code'=> 'USD',
                    'value'=> '10.00',
                ],
            ],
            items:[
                [
                    'seller_sku'=> 'PSMM-TEST-SKU-Jan-21_19_39_23-0788',
                    'seller_fulfillment_order_item_id'=> 'OrderItemID2',
                    'quantity'=> 1, ],
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
            language:'',
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
        $request = new CreateFulfillmentReturnRequest(
            items:[
                'item'=>[
                    'seller_return_item_id'=>'testReturn11',
                    'seller_fulfillment_order_item_id' => 'OrderItemID2',
                    'amazon_shipment_id' => 'D4yZjWZVN',
                    'return_comment'=> 'TestReturn',
                    'return_reason_code' =>'UNKNOWN_OTHER_REASON',
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
}
