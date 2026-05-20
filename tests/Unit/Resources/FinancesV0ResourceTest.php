<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Tests\Unit\Resources;

use Illuminate\Http\Client\Request;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventGroupsResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventsByGroupIdResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventsByOrderIdResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventsResponse;
use Jasara\AmznSPA\Resources\FinancesV0Resource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FinancesV0Resource::class)]
class FinancesV0ResourceTest extends UnitTestCase
{
    public function test_list_financial_event_groups(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('finances-v0/list-financial-event-groups');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->finances_v0->listFinancialEventGroups(
            max_results_per_page: 10,
            financial_event_group_started_before: 'FinancialEventGroupStartedBeforeValue',
            financial_event_group_started_after: 'FinancialEventGroupStartedAfterValue',
            next_token: 'NextTokenValue',
        );

        $this->assertInstanceOf(ListFinancialEventGroupsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/v0/financialEventGroups?MaxResultsPerPage=10&FinancialEventGroupStartedBefore=FinancialEventGroupStartedBeforeValue&FinancialEventGroupStartedAfter=FinancialEventGroupStartedAfterValue&NextToken=NextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_list_financial_events_by_group_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('finances-v0/list-financial-events-by-group-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->finances_v0->listFinancialEventsByGroupId(
            event_group_id: 'eventGroupIdValue',
            max_results_per_page: 10,
            posted_after: 'PostedAfterValue',
            posted_before: 'PostedBeforeValue',
            next_token: 'NextTokenValue',
        );

        $this->assertInstanceOf(ListFinancialEventsByGroupIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/v0/financialEventGroups/eventGroupIdValue/financialEvents?MaxResultsPerPage=10&PostedAfter=PostedAfterValue&PostedBefore=PostedBeforeValue&NextToken=NextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_list_financial_events_by_order_id(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('finances-v0/list-financial-events-by-order-id');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->finances_v0->listFinancialEventsByOrderId(
            order_id: 'orderIdValue',
            max_results_per_page: 10,
            next_token: 'NextTokenValue',
        );

        $this->assertInstanceOf(ListFinancialEventsByOrderIdResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/v0/orders/orderIdValue/financialEvents?MaxResultsPerPage=10&NextToken=NextTokenValue', urldecode($request->url()));

            return true;
        });
    }

    public function test_list_financial_events(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('finances-v0/list-financial-events');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->finances_v0->listFinancialEvents(
            max_results_per_page: 10,
            posted_after: 'PostedAfterValue',
            posted_before: 'PostedBeforeValue',
            next_token: 'NextTokenValue',
        );

        $this->assertInstanceOf(ListFinancialEventsResponse::class, $response);
        $this->assertNotNull($response->metadata->amzn_request_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/finances/v0/financialEvents?MaxResultsPerPage=10&PostedAfter=PostedAfterValue&PostedBefore=PostedBeforeValue&NextToken=NextTokenValue', urldecode($request->url()));

            return true;
        });
    }
}
