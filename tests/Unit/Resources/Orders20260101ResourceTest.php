<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Carbon\CarbonImmutable;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Orders\v20260101\GetOrderResponse;
use Jasara\AmznSPA\Data\Responses\Orders\v20260101\SearchOrdersResponse;
use Jasara\AmznSPA\Resources\Orders20260101Resource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Orders20260101Resource::class)]
final class Orders20260101ResourceTest extends UnitTestCase
{
    public function testSearchOrders(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'tokens/create-restricted-data-token',
            'orders/v20260101/search-orders',
        ]);

        $created_after = CarbonImmutable::now()->subDays(7);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders20260101->searchOrders(
            created_after: $created_after,
            marketplace_ids: ['ATVPDKIKX0DER'],
        );

        $this->assertInstanceOf(SearchOrdersResponse::class, $response);
        $this->assertCount(2, $response->orders);
        $this->assertEquals('123-4567890-1234567', $response->orders[0]->order_id);
        $this->assertEquals('SHIPPED', $response->orders[0]->fulfillment->fulfillment_status);
        $this->assertEquals('eyJuZXh0VG9rZW4iOiJhYmMxMjMifQ==', $response->pagination->next_token);

        $http->assertSentInOrder([
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) use ($created_after) {
                $this->assertEquals('GET', $request->method());
                $this->assertStringContainsString('/orders/2026-01-01/orders', $request->url());
                $this->assertStringContainsString('createdAfter=' . urlencode($created_after->tz('UTC')->format('Y-m-d\TH:i:s\Z')), $request->url());

                return true;
            },
        ]);
    }

    public function testSearchOrdersWithoutPiiDoesNotUseRdt(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'orders/v20260101/search-orders',
        ]);

        $created_after = CarbonImmutable::now()->subDays(7);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders20260101->searchOrders(
            created_after: $created_after,
            included_data: ['FULFILLMENT', 'PROCEEDS'],
        );

        $this->assertInstanceOf(SearchOrdersResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertStringContainsString('/orders/2026-01-01/orders', $request->url());

            return true;
        });
    }

    public function testSearchOrdersWithRecipientDataUsesRdt(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'tokens/create-restricted-data-token',
            'orders/v20260101/search-orders',
        ]);

        $created_after = CarbonImmutable::now()->subDays(7);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders20260101->searchOrders(
            created_after: $created_after,
            included_data: ['RECIPIENT', 'FULFILLMENT'],
        );

        $this->assertInstanceOf(SearchOrdersResponse::class, $response);

        $http->assertSentInOrder([
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) {
                $this->assertEquals('GET', $request->method());
                $this->assertStringContainsString('/orders/2026-01-01/orders', $request->url());

                return true;
            },
        ]);
    }

    public function testGetOrder(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'tokens/create-restricted-data-token',
            'orders/v20260101/get-order',
        ]);

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders20260101->getOrder($order_id);

        $this->assertInstanceOf(GetOrderResponse::class, $response);
        $this->assertEquals('123-4567890-1234567', $response->order->order_id);
        $this->assertEquals('SHIPPED', $response->order->fulfillment->fulfillment_status);
        $this->assertEquals('AMAZON', $response->order->fulfillment->fulfilled_by);
        $this->assertEquals('USD', $response->order->proceeds->grand_total->currency_code);
        $this->assertCount(1, $response->order->order_items);
        $this->assertEquals('B08N5WRWNW', $response->order->order_items[0]->product->asin);
        $this->assertEquals(2, $response->order->order_items[0]->quantity_ordered);

        $http->assertSentInOrder([
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) use ($order_id) {
                $this->assertEquals('GET', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/orders/2026-01-01/orders/' . $order_id, $request->url());

                return true;
            },
        ]);
    }

    public function testGetOrderWithSpecificIncludedData(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'tokens/create-restricted-data-token',
            'orders/v20260101/get-order',
        ]);

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders20260101->getOrder($order_id, included_data: ['BUYER', 'FULFILLMENT']);

        $this->assertInstanceOf(GetOrderResponse::class, $response);
        $this->assertEquals('123-4567890-1234567', $response->order->order_id);

        $http->assertSentInOrder([
            function (Request $request) {
                $this->assertEquals('POST', $request->method());
                $this->assertEquals('https://sellingpartnerapi-na.amazon.com/tokens/2021-03-01/restrictedDataToken', $request->url());

                return true;
            },
            function (Request $request) use ($order_id) {
                $this->assertEquals('GET', $request->method());
                $this->assertStringContainsString('/orders/2026-01-01/orders/' . $order_id, $request->url());

                return true;
            },
        ]);
    }

    public function testGetOrderWithoutPiiDoesNotUseRdt(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp([
            'orders/v20260101/get-order',
        ]);

        $order_id = Str::random();

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->orders20260101->getOrder($order_id, included_data: ['FULFILLMENT', 'PROCEEDS']);

        $this->assertInstanceOf(GetOrderResponse::class, $response);

        $http->assertSent(function (Request $request) use ($order_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertStringContainsString('/orders/2026-01-01/orders/' . $order_id, $request->url());

            return true;
        });
    }
}
