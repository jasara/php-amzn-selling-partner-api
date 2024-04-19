<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources\FulfillmentInbound;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CreateInboundPlanRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GeneratePlacementOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\SetPackingInformationRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CancelInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmPackingOptionResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CreateInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GeneratePackingOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GeneratePlacementOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanBoxesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanPalletsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlansResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingGroupItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPlacementOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\SetPackingInformationResponse;
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

        $this->assertInstanceOf(CancelInboundPlanResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5602', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/cancellation', $request->url());

            return true;
        });
    }

    public function testListInboundPlanItems(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-inbound-plan-items');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listInboundPlanItems(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(ListInboundPlanItemsResponse::class, $response);
        $this->assertEquals('manufacturingLotCode', $response->items[0]->manufacturing_lot_code);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/items', $request->url());

            return true;
        });
    }

    public function testSetPackingInformation(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/set-packing-information');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->setPackingInformation(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            body: SetPackingInformationRequest::from([
                'package_groupings' => [],
            ]),
        );

        $this->assertInstanceOf(SetPackingInformationResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5600', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/packingInformation', $request->url());

            return true;
        });
    }

    public function testListPackingOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-packing-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listPackingOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(ListPackingOptionsResponse::class, $response);
        $this->assertEquals('po1234abcd-1234-abcd-5678-1234abcd5678', $response->packing_options[0]->packing_option_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/packingOptions', $request->url());

            return true;
        });
    }

    public function testGeneratePackingOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/generate-packing-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->generatePackingOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(GeneratePackingOptionsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5601', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/packingOptions', $request->url());

            return true;
        });
    }

    public function testConfirmPackingOption(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/confirm-packing-option');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->confirmPackingOption(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            packing_option_id: $packing_option_id = Str::random(38),
        );

        $this->assertInstanceOf(ConfirmPackingOptionResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5603', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $packing_option_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/packingOptions/' . $packing_option_id . '/confirmation', $request->url());

            return true;
        });
    }

    public function testListPackingGroupItems(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-packing-group-items');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listPackingGroupItems(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            packing_option_id: $packing_option_id = Str::random(38),
            packing_group_id: $packing_group_id = Str::random(38),
        );

        $this->assertInstanceOf(ListPackingGroupItemsResponse::class, $response);
        $this->assertEquals('ITEM_POLYBAGGING', $response->items[0]->prep_instructions[0]->prep_type->value);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $packing_option_id, $packing_group_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id
            . '/packingOptions/' . $packing_option_id
            . '/packingGroups/' . $packing_group_id
            . '/items', $request->url());

            return true;
        });
    }

    public function testListInboundPlanPallets(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-inbound-plan-pallets');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listInboundPlanPallets(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(ListInboundPlanPalletsResponse::class, $response);
        $this->assertEquals('pk1234abcd-1234-abcd-5678-1234abcd5678', $response->pallets[0]->package_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/pallets', $request->url());

            return true;
        });
    }

    public function testListPlacementOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-placement-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listPlacementOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
        );

        $this->assertInstanceOf(ListPlacementOptionsResponse::class, $response);
        $this->assertEquals('pl1234abcd-1234-abcd-5678-1234abcd5678', $response->placement_options[0]->placement_option_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/placementOptions', $request->url());

            return true;
        });
    }

    public function testGeneratePlacementOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/generate-placement-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->generatePlacementOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            body: GeneratePlacementOptionsRequest::from(),
        );

        $this->assertInstanceOf(GeneratePlacementOptionsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5604', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/placementOptions', $request->url());

            return true;
        });
    }
}
