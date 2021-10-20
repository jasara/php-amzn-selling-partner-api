<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment\GetEligibleShipmentServicesRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment\GetEligibleShipmentServicesResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class MerchantFulFillmentResourceTest extends UnitTestCase
{
    public function testGetEligibleShipmentServicesOld()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('merchant-fullfillment/get-eligible-shipment-services-old');

        $request = new GetEligibleShipmentServicesRequest(
            shipment_request_details: [
                'amazon_order_id' => '52986411826454',
                'item_list' => [
                    'item' =>[
                        'order_item_id'=> Str::random(),
                        'quantity'=> rand(1, 10),
                    ],
                ],
                'ship_from_address' =>[
                    'name'=> Str::random(),
                    'address_line_1'=> Str::random(),
                    'address_line_2'=> Str::random(),
                    'email'=> 'tagrid@hotmail.com',
                    'city'=> Str::random(),
                    'state_or_province_code'=> 'NY',
                    'postal_code'=> '21222',
                    'country_code'=> 'US',
                    'phone'=>'09888888877',
                ],
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
        $response = $amzn->Merchant_fulfillment->getEligibleShipmentServicesOld($request);

        $this->assertInstanceOf(GetEligibleShipmentServicesResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/mfn/v0/eligibleServices', urldecode($request->url()));

            return true;
        });
    }
}
