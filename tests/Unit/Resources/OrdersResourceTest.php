<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\Ordres\GetOrdersResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

class OrdersResourceTest extends UnitTestCase
{
    public function testGetOrders()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/orders/get-orders');

        $created_after = CarbonImmutable::now();
        $created_before = CarbonImmutable::now();
        $last_updated_after = CarbonImmutable::now();
        $last_updated_before = CarbonImmutable::now();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrders(
            created_after:$created_after,
            created_before:$created_before,
            last_updated_after:$last_updated_after,
            last_updated_before:$last_updated_before,
            order_statuses:[],
            marketplace_ids: ['ATVPDKIKX0DER'],
            fulfillment_channels:[],
            payment_methods:[],
            buyer_email:'',
            seller_order_id :'',
            max_results_per_page:10,
            easy_ship_shipment_statuses:[],
            next_token:'',
            amazon_order_ids:[],
            actual_fulfillment_supply_source_id:'',
            is_ispu:true,
            store_chain_store_id :'ISPU_StoreId',
        );

        $this->assertInstanceOf(GetOrdersResponse::class, $response);

        $orders = $response->payload;

        // $this->assertEquals('Success', $price->status);
        // $this->assertEquals('B00V5DG6IQ', $price->asin);
        // $this->assertEquals('ATVPDKIKX0DER', $price->product->identifiers->marketplace_asin->marketplace_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders', $request->url());

            return true;
        });
    }
}
