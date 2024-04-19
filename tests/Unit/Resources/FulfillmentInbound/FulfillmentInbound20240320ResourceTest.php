<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources\FulfillmentInbound;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CreateInboundPlanRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CreateInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanBoxesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlansResponse;
use Jasara\AmznSPA\Resources\FulfillmentInbound\FulfillmentInbound20240320Resource;
use Jasara\AmznSPA\Tests\Unit\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FulfillmentInbound20240320Resource::class)]
class FulfillmentInbound20240320ResourceTest extends UnitTestCase
{
    public function testListInboundPlans(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-inbound-plans');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listInboundPlans(
            page_size: 30,
        );

        $this->assertInstanceOf(ListInboundPlansResponse::class, $response);
        $this->assertEquals('wf1234abcd-1234-abcd-5678-1234abcd5678', $response->inbound_plans[0]->inbound_plan_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans?pageSize=30', $request->url());

            return true;
        });
    }

    public function testCreateInboundPlan(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/create-inbound-plan');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->createInboundPlan(CreateInboundPlanRequest::from([
            'contact_information' => [
                'email' => 'test@test.com',
            ],
            'destination_marketplaces' => [
                'ATVPDKIKX0DER',
            ],
            'items' => [
                [
                    'label_owner' => 'AMAZON',
                    'msku' => 'msku',
                    'prep_owner' => 'AMAZON',
                    'quantity' => 1,
                ],
            ],
        ]));

        $this->assertInstanceOf(CreateInboundPlanResponse::class, $response);
        $this->assertEquals('wf1234abcd-1234-abcd-5678-1234abcd5678', $response->inbound_plan_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans', $request->url());

            return true;
        });
    }

    public function testGetInboundPlan(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/get-inbound-plan');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->getInboundPlan(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(GetInboundPlanResponse::class, $response);
        $this->assertEquals('FBA (03/20/2024, 12:01 PM)', $response->name);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id, $request->url());

            return true;
        });
    }

    public function testListInboundPlanBoxes(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-inbound-plan-boxes');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listInboundPlanBoxes(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(ListInboundPlanBoxesResponse::class, $response);
        $this->assertEquals('pk1234abcd-1234-abcd-5678-1234abcd5678', $response->boxes[0]->package_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/boxes', $request->url());

            return true;
        });
    }

    public function testCancelInboundPlan(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/cancel-inbound-plan');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->cancelInboundPlan(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertNull($response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('DELETE', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id, $request->url());

            return true;
        });
    }
}
