<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderAddressResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderBuyerInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrdersResponse;
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
            payment_methods:null,
            buyer_email:'',
            seller_order_id :'',
            max_results_per_page:10,
            easy_ship_shipment_statuses:[],
            next_token:'',
            amazon_order_ids:[],
            actual_fulfillment_supply_source_id:'',
            is_ispu:false,
            store_chain_store_id :'ISPU_StoreId',
        );

        $this->assertInstanceOf(GetOrdersResponse::class, $response);

        $orders = $response->payload;

        $this->assertEquals('902-1845936-5435065', $orders->orders[0]->amazon_order_id);
        $this->assertEquals('Unshipped', $orders->orders[0]->order_status);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders?max_results_per_page=10&store_chain_store_id=ISPU_StoreId', $request->url());

            return true;
        });
    }

    public function testGetOrder()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/orders/get-order');

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrder($order_id);

        $this->assertInstanceOf(GetOrderResponse::class, $response);
        $this->assertEquals('921-3175655-0452641', $response->payload->amazon_order_id);

        $http->assertSent(function (Request $request) use ($order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id, $request->url());

            return true;
        });
    }

    public function testGetOrderBuyerInfo()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/orders/get-order-buyer-info');

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrderBuyerInfo($order_id);

        $this->assertInstanceOf(GetOrderBuyerInfoResponse::class, $response);
        $this->assertEquals('902-1845936-5435065', $response->payload->amazon_order_id);

        $http->assertSent(function (Request $request) use ($order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id . '/buyerInfo', $request->url());

            return true;
        });
    }

    public function testGetOrderAddress()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/orders/get-order-address');

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrderAddress($order_id);

        $this->assertInstanceOf(GetOrderAddressResponse::class, $response);
        // $this->assertEquals('902-1845936-5435065', $response->payload->amazon_order_id);

        $http->assertSent(function (Request $request) use ($order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id . '/address', $request->url());

            return true;
        });
    }
}
