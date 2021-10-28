<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\GetFulfillmentPreviewRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFulfillmentPreviewResponse;
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

        // dd($request);
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
}
