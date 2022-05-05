<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderAddressResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderBuyerInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderItemsBuyerInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderItemsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\Orders\GetOrdersResponse;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;

/**
 * @covers \Jasara\AmznSPA\Resources\OrdersResource
 */
class OrdersResourceTest extends UnitTestCase
{
    public function testGetOrders()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp(['tokens/create-restricted-data-token', '/orders/get-orders']);

        $created_after = CarbonImmutable::now();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrders(
            created_after: $created_after,
            order_statuses: ['Pending'],
            marketplace_ids: ['ATVPDKIKX0DER'],
            fulfillment_channels: ['MFN'],
            payment_methods: null,
            buyer_email: 'tagrid@gmail.com',
            seller_order_id : '',
            max_results_per_page: 10,
            easy_ship_shipment_statuses: [],
            next_token: '',
            amazon_order_ids: [],
            actual_fulfillment_supply_source_id: '',
            is_ispu: false,
            store_chain_store_id : 'ISPU_StoreId',
        );

        $this->assertInstanceOf(GetOrdersResponse::class, $response);

        $orders = $response->payload;

        $this->assertEquals('902-1845936-5435065', $orders->orders[0]->amazon_order_id);
        $this->assertEquals('Unshipped', $orders->orders[0]->order_status);

        $request_validation = [
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());
                $this->assertEquals(['buyerInfo', 'shippingAddress'], json_decode($request->body(), true)['restrictedResources'][0]['dataElements']);

                return true;
            },
            function (Request $request) use ($created_after) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders?MarketplaceIds=ATVPDKIKX0DER&CreatedAfter=' . $created_after->tz('UTC')->format('Y-m-d\TH:i:s\Z') . '&OrderStatuses=Pending&FulfillmentChannels=MFN&BuyerEmail=tagrid@gmail.com&MaxResultsPerPage=10&StoreChainStoreId=ISPU_StoreId', urldecode($request->url()));

                return true;
            },
        ];

        $http->assertSentInOrder($request_validation);
    }

    public function testGetOrder()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp(['tokens/create-restricted-data-token', '/orders/get-order']);

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrder($order_id);

        $this->assertInstanceOf(GetOrderResponse::class, $response);
        $this->assertEquals('921-3175655-0452641', $response->payload->amazon_order_id);

        $request_validation = [
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) use ($order_id) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id, $request->url());

                return true;
            },
        ];

        $http->assertSentInOrder($request_validation);
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
        $this->assertEquals('902-1845936-5435065', $response->payload->amazon_order_id);

        $http->assertSent(function (Request $request) use ($order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id . '/address', $request->url());

            return true;
        });
    }

    public function testGetOrderItems()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp(['tokens/create-restricted-data-token', 'orders/get-order-items']);

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrderItems($order_id);

        $this->assertInstanceOf(GetOrderItemsResponse::class, $response);
        $this->assertEquals('902-1845936-5435065', $response->payload->amazon_order_id);

        $request_validation = [
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) use ($order_id) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id . '/orderItems', $request->url());

                return true;
            },
        ];

        $http->assertSentInOrder($request_validation);
    }

    public function testGetOrderItemsBuyerInfo()
    {
        list($config, $http) = $this->setupConfigWithFakeHttp('/orders/get-order-items-buyer-info');

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders->getOrderItemsBuyerInfo($order_id);

        $this->assertInstanceOf(GetOrderItemsBuyerInfoResponse::class, $response);
        $this->assertEquals('JPY', $response->payload->order_items[0]->gift_wrap_price->currency_code);

        $http->assertSent(function (Request $request) use ($order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/v0/orders/' . $order_id . '/orderItems/buyerInfo', $request->url());

            return true;
        });
    }
}
