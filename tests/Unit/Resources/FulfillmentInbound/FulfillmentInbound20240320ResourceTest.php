<?php

namespace Jasara\AmznSPA\Tests\Unit\Resources\FulfillmentInbound;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Jasara\AmznSPA\AmznSPA;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CancelSelfShipAppointmentRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\ConfirmTransportationOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CreateInboundPlanRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CreateMarketplaceItemLabelsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GeneratePlacementOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GenerateSelfShipAppointmentSlotsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GenerateShipmentContentUpdatePreviewsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GenerateTransportationOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\ScheduleSelfShipAppointmentRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\SetPackingInformationRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateItemComplianceDetailsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateShipmentDeliveryWindowRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateShipmentSourceAddressRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateShipmentTrackingDetailsRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CancelInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CancelSelfShipAppointmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmDeliveryWindowOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmPackingOptionResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmPlacementOptionResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmShipmentContentUpdatePreviewResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmTransportationOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CreateInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CreateMarketplaceItemLabelsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GenerateDeliveryWindowOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GeneratePackingOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GeneratePlacementOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GenerateSelfShipAppointmentSlotsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GenerateShipmentContentUpdatePreviewsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GenerateTransportationOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetDeliveryChallanDocumentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetSelfShipAppointmentSlotsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetShipmentContentUpdatePreviewResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetShipmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\InboundOperationStatusResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListDeliveryWindowOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanBoxesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanPalletsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlansResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListItemComplianceDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingGroupBoxesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingGroupItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPlacementOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPrepDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListShipmentBoxesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListShipmentContentUpdatePreviewsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListShipmentItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListShipmentPalletsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListTransportationOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ScheduleSelfShipAppointmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\SetPackingInformationResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\SetPrepDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateItemComplianceDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateShipmentDeliveryWindowResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateShipmentSourceAddressResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateShipmentTrackingDetailsResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\MskuPrepDetailInputSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\MskuPrepDetailInputSchemaList;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PrepCategory;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PrepType;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\PrepTypeList;
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
            'source_address' => [
                'name' => Str::random(10),
                'address_line_1' => Str::random(),
                'address_line_2' => null,
                'district_or_county' => Str::random(),
                'city' => Str::random(),
                'state_or_province_code' => Str::random(),
                'country_code' => Str::random(2),
                'postal_code' => Str::random(),
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
            packing_group_id: $packing_group_id = Str::random(38),
        );

        $this->assertInstanceOf(ListPackingGroupItemsResponse::class, $response);
        $this->assertEquals('ITEM_POLYBAGGING', $response->items[0]->prep_instructions[0]->prep_type->value);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $packing_group_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id
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

    public function testConfirmPlacementOption(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/confirm-placement-option');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->confirmPlacementOption(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            placement_option_id: $placement_id = Str::random(38),
        );

        $this->assertInstanceOf(ConfirmPlacementOptionResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5605', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $placement_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/placementOptions/' . $placement_id . '/confirmation', $request->url());

            return true;
        });
    }

    public function testGetShipment(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/get-shipment');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->getShipment(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(GetShipmentResponse::class, $response);
        $this->assertEquals('sh1234abcd-1234-abcd-5678-1234abcd5678', $response->shipment->shipment_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id, $request->url());

            return true;
        });
    }

    public function testGetDeliveryChallanDocument(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/get-delivery-challan-document');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->getDeliveryChallanDocument(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(GetDeliveryChallanDocumentResponse::class, $response);
        $this->assertEquals('URL', $response->document_download->download_type->value);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryChallanDocument', $request->url());

            return true;
        });
    }

    public function testUpdateShipmentDeliveryWindow(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/update-shipment-delivery-window');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->updateShipmentDeliveryWindow(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            body: UpdateShipmentDeliveryWindowRequest::from([
                'delivery_window' => [
                    'start' => '2024-03-20T12:00:00Z',
                ],
            ]),
        );

        $this->assertInstanceOf(UpdateShipmentDeliveryWindowResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5606', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryWindow', $request->url());

            return true;
        });
    }

    public function testGetSelfShipAppointmentSlots(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/get-self-ship-appointment-slots');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->getSelfShipAppointmentSlots(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(GetSelfShipAppointmentSlotsResponse::class, $response);
        $this->assertEquals('aa1234abcd-1234-abcd-5678-1234abcd5678', $response->self_ship_appointment_slots_availability->slots[0]->slot_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/selfShipAppointmentSlots', $request->url());

            return true;
        });
    }

    public function testGenerateSelfShipAppointmentSlots(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/generate-self-ship-appointment-slots');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->generateSelfShipAppointmentSlots(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            body: GenerateSelfShipAppointmentSlotsRequest::from(),
        );

        $this->assertInstanceOf(GenerateSelfShipAppointmentSlotsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5607', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/selfShipAppointmentSlots', $request->url());

            return true;
        });
    }

    public function testCancelSelfShipAppointmentSlots(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/cancel-self-ship-appointment-slots');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->cancelSelfShipAppointmentSlots(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            slot_id: $slot_id = Str::random(38),
            body: CancelSelfShipAppointmentRequest::from([
                'reason_comment' => 'APPOINTMENT_REQUESTED_BY_MISTAKE',
            ]),
        );

        $this->assertInstanceOf(CancelSelfShipAppointmentResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5608', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id, $slot_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/selfShipAppointmentSlots/' . $slot_id . '/cancellation', $request->url());

            return true;
        });
    }

    public function testScheduleSelfShipAppointment(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/schedule-self-ship-appointment');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->scheduleSelfShipAppointment(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            slot_id: $slot_id = Str::random(38),
            body: ScheduleSelfShipAppointmentRequest::from([
                'reason_comment' => 'APPOINTMENT_REQUESTED_BY_MISTAKE',
            ]),
        );

        $this->assertInstanceOf(ScheduleSelfShipAppointmentResponse::class, $response);
        $this->assertEquals('1000', $response->self_ship_appointment_details->appointment_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id, $slot_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/selfShipAppointmentSlots/' . $slot_id . '/schedule', $request->url());

            return true;
        });
    }

    public function testUpdateShipmentTrackingDetails(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/update-shipment-tracking-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->updateShipmentTrackingDetails(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            body: UpdateShipmentTrackingDetailsRequest::from([
                'tracking_details' => [],
            ]),
        );

        $this->assertInstanceOf(UpdateShipmentTrackingDetailsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5609', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/trackingDetails', $request->url());

            return true;
        });
    }

    public function testListTransportationOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-transportation-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listTransportationOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(ListTransportationOptionsResponse::class, $response);
        $this->assertEquals('sh1234abcd-1234-abcd-5678-1234abcd5678', $response->transportation_options[0]->shipment_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/transportationOptions?shipmentId=' . $shipment_id, $request->url());

            return true;
        });
    }

    public function testGenerateTransportationOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/generate-transportation-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->generateTransportationOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            body: GenerateTransportationOptionsRequest::from([
                'placement_option_id' => Str::random(38),
                'shipment_transportation_configurations' => [],
            ]),
        );

        $this->assertInstanceOf(GenerateTransportationOptionsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5610', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/transportationOptions', $request->url());

            return true;
        });
    }

    public function testConfirmTransportationOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/confirm-transportation-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->confirmTransportationOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            body: ConfirmTransportationOptionsRequest::from([
                'transportation_selections' => [],
            ]),
        );

        $this->assertInstanceOf(ConfirmTransportationOptionsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5611', $response->operation_id);

        $http->assertSent(function (Request $request) use ($inbound_plan_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/transportationOptions/confirmation', $request->url());

            return true;
        });
    }

    public function testListItemComplianceDetails(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-item-compliance-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listItemComplianceDetails(
            mskus: ['msku'],
            marketplace_id: 'ATVPDKIKX0DER',
        );

        $this->assertInstanceOf(ListItemComplianceDetailsResponse::class, $response);
        $this->assertEquals('720299', $response->compliance_details[0]->tax_details->hsn_code);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/items/compliance?mskus=msku&marketplaceId=ATVPDKIKX0DER', $request->url());

            return true;
        });
    }

    public function testUpdateItemComplianceDetails(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/update-item-compliance-details');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->updateItemComplianceDetails(
            marketplace_id: 'ATVPDKIKX0DER',
            body: UpdateItemComplianceDetailsRequest::from([
                'msku' => 'msku',
                'tax_details' => [
                    'tax_rates' => [],
                ],
            ]),
        );

        $this->assertInstanceOf(UpdateItemComplianceDetailsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd5612', $response->operation_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/items/compliance?marketplaceId=ATVPDKIKX0DER', $request->url());

            return true;
        });
    }

    public function testGetInboundOperationStatus(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/get-inbound-operation-status');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $operation_id = Str::random(38);
        $response = $amzn->fulfillment_inbound20240320->getInboundOperationStatus(
            operation_id: $operation_id,
        );

        $this->assertInstanceOf(InboundOperationStatusResponse::class, $response);
        $this->assertEquals('The dimension does not match what is expected.', $response->operation->operation_problems[0]->message);

        $http->assertSent(function (Request $request) use ($operation_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/operations/' . $operation_id, $request->url());

            return true;
        });
    }

    public function testUpdateInboundPlanName(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/update-inbound-plan-name');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $inbound_plan_id = Str::random(38);
        $name = 'Updated Plan Name';
        $amzn->fulfillment_inbound20240320->updateInboundPlanName(
            inbound_plan_id: $inbound_plan_id,
            name: $name,
        );

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $name) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/name', $request->url());
            $this->assertEquals(['name' => $name], $request->data());

            return true;
        });
    }

    public function testListPackingGroupBoxes(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-packing-group-boxes');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listPackingGroupBoxes(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            packing_group_id: $packing_group_id = Str::random(38),
        );

        $this->assertInstanceOf(ListPackingGroupBoxesResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $packing_group_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/packingGroups/' . $packing_group_id . '/boxes', $request->url());

            return true;
        });
    }

    public function testListShipmentBoxes(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-shipment-boxes');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listShipmentBoxes(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(ListShipmentBoxesResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/boxes', $request->url());

            return true;
        });
    }

    public function testListShipmentContentUpdatePreviews(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-shipment-content-update-previews');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listShipmentContentUpdatePreviews(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(ListShipmentContentUpdatePreviewsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/contentUpdatePreviews', $request->url());

            return true;
        });
    }

    public function testGenerateShipmentContentUpdatePreviews(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/generate-shipment-content-update-previews');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->generateShipmentContentUpdatePreviews(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            body: GenerateShipmentContentUpdatePreviewsRequest::from([
                'boxes' => [],
                'items' => [],
            ]),
        );

        $this->assertInstanceOf(GenerateShipmentContentUpdatePreviewsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/contentUpdatePreviews', $request->url());

            return true;
        });
    }

    public function testGetShipmentContentUpdatePreview(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/get-shipment-content-update-preview');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->getShipmentContentUpdatePreview(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            content_update_preview_id: $content_update_preview_id = Str::random(38),
        );

        $this->assertInstanceOf(GetShipmentContentUpdatePreviewResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id, $content_update_preview_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/contentUpdatePreviews/' . $content_update_preview_id, $request->url());

            return true;
        });
    }

    public function testConfirmShipmentContentUpdatePreview(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/confirm-shipment-content-update-preview');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->confirmShipmentContentUpdatePreview(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            content_update_preview_id: $content_update_preview_id = Str::random(38),
        );

        $this->assertInstanceOf(ConfirmShipmentContentUpdatePreviewResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id, $content_update_preview_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/contentUpdatePreviews/' . $content_update_preview_id . '/confirmation', $request->url());

            return true;
        });
    }

    public function testListDeliveryWindowOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-delivery-window-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listDeliveryWindowOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(ListDeliveryWindowOptionsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryWindowOptions', $request->url());

            return true;
        });
    }

    public function testGenerateDeliveryWindowOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/generate-delivery-window-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->generateDeliveryWindowOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(GenerateDeliveryWindowOptionsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryWindowOptions', $request->url());

            return true;
        });
    }

    public function testConfirmDeliveryWindowOptions(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/confirm-delivery-window-options');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->confirmDeliveryWindowOptions(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            delivery_window_option_id: $delivery_window_option_id = Str::random(38),
        );

        $this->assertInstanceOf(ConfirmDeliveryWindowOptionsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id, $delivery_window_option_id) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryWindowOptions/' . $delivery_window_option_id . '/confirmation', $request->url());

            return true;
        });
    }

    public function testListShipmentItems(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-shipment-items');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listShipmentItems(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(ListShipmentItemsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/items', $request->url());

            return true;
        });
    }

    public function testUpdateShipmentName(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/update-shipment-name');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $inbound_plan_id = Str::random(38);
        $shipment_id = Str::random(38);
        $name = 'Updated Shipment Name';
        $amzn->fulfillment_inbound20240320->updateShipmentName(
            inbound_plan_id: $inbound_plan_id,
            shipment_id: $shipment_id,
            name: $name,
        );

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id, $name) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/name', $request->url());
            $this->assertEquals(['name' => $name], $request->data());

            return true;
        });
    }

    public function testListShipmentPallets(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-shipment-pallets');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listShipmentPallets(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
        );

        $this->assertInstanceOf(ListShipmentPalletsResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/pallets', $request->url());

            return true;
        });
    }

    public function testUpdateShipmentSourceAddress(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/update-shipment-source-address');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->updateShipmentSourceAddress(
            inbound_plan_id: $inbound_plan_id = Str::random(38),
            shipment_id: $shipment_id = Str::random(38),
            body: UpdateShipmentSourceAddressRequest::from([
                'address' => [
                    'name' => 'John Doe',
                    'address_line_1' => '123 Main St',
                    'city' => 'Anytown',
                    'state_or_province_code' => 'NY',
                    'postal_code' => '12345',
                    'country_code' => 'US',
                ],
            ]),
        );

        $this->assertInstanceOf(UpdateShipmentSourceAddressResponse::class, $response);

        $http->assertSent(function (Request $request) use ($inbound_plan_id, $shipment_id) {
            $this->assertEquals('PUT', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/sourceAddress', $request->url());

            return true;
        });
    }

    public function testCreateMarketplaceItemLabels(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/create-marketplace-item-labels');

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->createMarketplaceItemLabels(
            CreateMarketplaceItemLabelsRequest::from([
                'marketplace_id' => 'ATVPDKIKX0DER',
                'label_type' => 'STANDARD_FORMAT',
                'msku_quantities' => [
                    ['msku' => 'SKU123', 'quantity' => 10],
                ],
            ]),
        );

        $this->assertInstanceOf(CreateMarketplaceItemLabelsResponse::class, $response);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/items/labels', $request->url());

            return true;
        });
    }

    public function testListPrepDetails(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/list-prep-details');

        $mskus = ['msku1', 'msku2'];

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->listPrepDetails(
            marketplace_id: 'ATVPDKIKX0DER',
            mskus: $mskus,
        );

        $this->assertInstanceOf(ListPrepDetailsResponse::class, $response);
        $this->assertEquals('msku1', $response->msku_prep_details[0]->msku);

        $http->assertSent(function (Request $request) use ($mskus) {
            $this->assertEquals('GET', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/items/prepDetails?marketplaceId=ATVPDKIKX0DER&mskus=msku1,msku2', urldecode($request->url()));

            return true;
        });
    }

    public function testSetPrepDetails(): void
    {
        [$config, $http] = $this->setupConfigWithFakeHttp('fulfillment-inbound/v20240320/set-prep-details');

        $msku_prep_details = MskuPrepDetailInputSchemaList::make([
            new MskuPrepDetailInputSchema(
                msku: 'msku1',
                prep_category: PrepCategory::Sharp,
                prep_types: PrepTypeList::make([
                    PrepType::Sharp,
                ]),
            ),
        ]);

        $amzn = new AmznSPA($config);
        $amzn = $amzn->usingMarketplace('ATVPDKIKX0DER');
        $response = $amzn->fulfillment_inbound20240320->setPrepDetails(
            marketplace_id: 'ATVPDKIKX0DER',
            msku_prep_details: $msku_prep_details,
        );

        $this->assertInstanceOf(SetPrepDetailsResponse::class, $response);
        $this->assertEquals('1234abcd-1234-abcd-5678-1234abcd1102', $response->operation_id);

        $http->assertSent(function (Request $request) {
            $this->assertEquals('POST', $request->method());
            $this->assertEquals('https://sellingpartnerapi-na.amazon.com/inbound/fba/2024-03-20/items/prepDetails', (string) $request->url());
            $this->assertEquals('ATVPDKIKX0DER', $request->data()['marketplaceId']);
            $this->assertEquals('SHARP', $request->data()['mskuPrepDetails'][0]['prepCategory']);
            $this->assertEquals('SHARP', $request->data()['mskuPrepDetails'][0]['prepTypes'][0]);

            return true;
        });
    }
}
