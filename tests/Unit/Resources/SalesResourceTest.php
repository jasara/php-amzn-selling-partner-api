<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\Sales\GetOrderMetricsResponse;
use Jasara\AmznSPA\Resources\SalesResource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(SalesResource::class)]
class SalesResourceTest extends UnitTestCase
{
    public function test_get_order_metrics(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('sales/get-order-metrics');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->sales->getOrderMetrics(
            marketplace_ids: [
                0 => 'ATVPDKIKX0DER',
            ],
            interval: 'intervalValue',
            granularity: 'granularityValue',
            granularity_time_zone: 'granularityTimeZoneValue',
            buyer_type: 'buyerTypeValue',
            fulfillment_network: 'fulfillmentNetworkValue',
            first_day_of_week: 'firstDayOfWeekValue',
            asin: 'asinValue',
            sku: 'skuValue',
            amazon_program: 'amazonProgramValue',
        );

        $this->assertInstanceOf(GetOrderMetricsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/sales/v1/orderMetrics?marketplaceIds=ATVPDKIKX0DER&interval=intervalValue&granularity=granularityValue&granularityTimeZone=granularityTimeZoneValue&buyerType=buyerTypeValue&fulfillmentNetwork=fulfillmentNetworkValue&firstDayOfWeek=firstDayOfWeekValue&asin=asinValue&sku=skuValue&amazonProgram=amazonProgramValue', urldecode($request->url()));

            return true;
        });
    }
}
