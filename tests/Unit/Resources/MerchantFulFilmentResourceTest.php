<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetEligibleShipmentServicesRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\CancelShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetEligibleShipmentServicesResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetShipmentResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class MerchantFulFilmentResourceTest extends UnitTestCase
{
    public function testGetEligibleShipmentServicesOld()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-eligible-shipment-services-old');

        $request = new GetEligibleShipmentServicesRequest(
            shipment_request_details:
            [
                'amazon_order_id' => '52986411826454',
                'item_list' => [
                    'item' =>[
                        'order_item_id'=> Str::random(),
                        'quantity'=> rand(1, 10),
                    ],
                ],
                'ship_from_address' => $this->setupAddress()->toArray(),
                'package_dimensions' =>[
                    'length' => 88,
                ],
                'weight' =>[
                    'value'=>77,
                    'unit'=>'oz',
                ],
                'shipping_service_options'=>[
                    'delivery_experience'=>'DeliveryConfirmationWithAdultSignature',
                    'carrier_will_pick_up'=>false,
                ],
                'label_customization'=>[
                    'custom_text_for_label'=>'988989i',
                ],
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getEligibleShipmentServicesOld($request);

        $this->assertInstanceOf(GetEligibleShipmentServicesResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/eligibleServices', urldecode($request->url()));

            return true;
        });
    }

    public function testGetEligibleShipmentServices()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-eligible-shipment-services-old');

        $request = new GetEligibleShipmentServicesRequest(
            shipment_request_details: [
                'amazon_order_id' => '52986411826454',
                'item_list' => [
                    'item' =>[
                        'order_item_id'=> Str::random(),
                        'quantity'=> rand(1, 10),
                    ],
                ],
                'ship_from_address' => $this->setupAddress()->toArray(),
                'package_dimensions' =>[
                    'length' => 88,
                ],
                'weight' =>[
                    'value'=>77,
                    'unit'=>'oz',
                ],
                'shipping_service_options'=>[
                    'delivery_experience'=>'DeliveryConfirmationWithAdultSignature',
                    'carrier_will_pick_up'=>false,
                ],
                'label_customization'=>[
                    'custom_text_for_label'=>'988989i',
                ],
            ]
        );

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getEligibleShipmentServices($request);

        $this->assertInstanceOf(GetEligibleShipmentServicesResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/eligibleShippingServices', urldecode($request->url()));

            return true;
        });
    }

    public function testGetShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/get-shipment');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->getShipment($shipment_id);

        $this->assertInstanceOf(GetShipmentResponse::class, $response);

        $shipment = $response->payload;

        $this->assertEquals('abcddcba-00c3-4f6f-a63a-639f76ee9253', $shipment->shipment_id);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/' . $shipment_id, $request->url());

            return true;
        });
    }

    public function testCancelShipment()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/cancel-shipment');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->cancelShipment($shipment_id);

        $this->assertInstanceOf(CancelShipmentResponse::class, $response);

        $shipment = $response->payload;

        $this->assertEquals('be7a0a53-00c3-4f6f-a63a-639f76ee9253', $shipment->shipment_id);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/' . $shipment_id, $request->url());

            return true;
        });
    }

    public function testCancelShipmentOld()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fulfillment/cancel-shipment');

        $shipment_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->merchant_fulfillment->cancelShipmentOld($shipment_id);

        $this->assertInstanceOf(CancelShipmentResponse::class, $response);

        $shipment = $response->payload;

        $this->assertEquals('be7a0a53-00c3-4f6f-a63a-639f76ee9253', $shipment->shipment_id);

        $http->assertSent(function (Request $request) use ($shipment_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/shipments/' . $shipment_id . '/cancel', $request->url());

            return true;
        });
    }
}
