<?php

namespace Jasara\AmznSPA\Resources\FulfillmentInbound;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Base\Validators\RuleValidator;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CancelSelfShipAppointmentRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\ConfirmTransportationOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\CreateInboundPlanRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GeneratePlacementOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\GenerateTransportationOptionsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\ScheduleSelfShipAppointmentRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\SetPackingInformationRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateItemComplianceDetailsRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateShipmentDeliveryWindowRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320\UpdateShipmentTrackingDetailsRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CancelInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CancelSelfShipAppointmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmPackingOptionResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmPlacementOptionResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ConfirmTransportationOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\CreateInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GeneratePackingOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GeneratePlacementOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GenerateSelfShipAppointmentSlotsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GenerateTransportationOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetDeliveryChallanDocumentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetInboundPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetSelfShipAppointmentSlotsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\GetShipmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\InboundOperationStatusResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanBoxesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlanPalletsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListInboundPlansResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListItemComplianceDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingGroupItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPackingOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListPlacementOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ListTransportationOptionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\ScheduleSelfShipAppointmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\SetPackingInformationResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateItemComplianceDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateShipmentDeliveryWindowResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v20240320\UpdateShipmentTrackingDetailsResponse;
use Jasara\AmznSPA\Data\Schemas\Common\SortOrder;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\InboundPlanStatus;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320\SortBy;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentInbound20240320Resource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/inbound/fba/2024-03-20/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function listInboundPlans(
        #[RuleValidator(['integer', 'min:1', 'max:30'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
        ?InboundPlanStatus $status = null,
        ?SortBy $sort_by = null,
        ?SortOrder $sort_order = null,
    ): ListInboundPlansResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ListInboundPlansResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans', array_filter([
                'pageSize' => $page_size,
                'paginationToken' => $pagination_token,
                'status' => $status?->value,
                'sortBy' => $sort_by?->value,
                'sortOrder' => $sort_order?->value,
            ]));

        return $response;
    }

    public function createInboundPlan(CreateInboundPlanRequest $request): CreateInboundPlanResponse
    {
        $response = $this->http
            ->responseClass(CreateInboundPlanResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans', (array) $request->toArrayObject());

        return $response;
    }

    public function getInboundPlan(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
    ): GetInboundPlanResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GetInboundPlanResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id);

        return $response;
    }

    public function listInboundPlanBoxes(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['integer', 'min:1', 'max:30'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): ListInboundPlanBoxesResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ListInboundPlanBoxesResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/boxes', array_filter([
                'pageSize' => $page_size,
                'paginationToken' => $pagination_token,
            ]));

        return $response;
    }

    public function cancelInboundPlan(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
    ): CancelInboundPlanResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(CancelInboundPlanResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/cancellation', []);

        return $response;
    }

    public function listInboundPlanItems(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['integer', 'min:1', 'max:30'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): ListInboundPlanItemsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ListInboundPlanItemsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/items', array_filter([
                'pageSize' => $page_size,
                'paginationToken' => $pagination_token,
            ]));

        return $response;
    }

    public function setPackingInformation(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        SetPackingInformationRequest $body,
    ): SetPackingInformationResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(SetPackingInformationResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/packingInformation', (array) $body->toArrayObject());

        return $response;
    }

    public function listPackingOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['integer', 'min:1', 'max:30'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): ListPackingOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ListPackingOptionsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/packingOptions', array_filter([
                'pageSize' => $page_size,
                'paginationToken' => $pagination_token,
            ]));

        return $response;
    }

    public function generatePackingOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
    ): GeneratePackingOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GeneratePackingOptionsResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/packingOptions', []);

        return $response;
    }

    public function confirmPackingOption(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $packing_option_id,
    ): ConfirmPackingOptionResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ConfirmPackingOptionResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/packingOptions/' . $packing_option_id . '/confirmation', []);

        return $response;
    }

    public function listPackingGroupItems(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $packing_option_id,
        #[RuleValidator(['size:38'])]
        string $packing_group_id,
        #[RuleValidator(['integer', 'min:1', 'max:100'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): ListPackingGroupItemsResponse {
        $response = $this->http
            ->responseClass(ListPackingGroupItemsResponse::class)
            ->get(
                $this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id
                . '/packingOptions/' . $packing_option_id
                . '/packingGroups/' . $packing_group_id
                . '/items',
                array_filter([
                    'pageSize' => $page_size,
                    'paginationToken' => $pagination_token,
                ])
            );

        return $response;
    }

    public function listInboundPlanPallets(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['integer', 'min:1', 'max:1000'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): ListInboundPlanPalletsResponse {
        $response = $this->http
            ->responseClass(ListInboundPlanPalletsResponse::class)
            ->get(
                $this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/pallets',
                array_filter([
                    'pageSize' => $page_size,
                    'paginationToken' => $pagination_token,
                ])
            );

        return $response;
    }

    public function listPlacementOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['integer', 'min:1', 'max:1000'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): ListPlacementOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ListPlacementOptionsResponse::class)
            ->get(
                $this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/placementOptions',
                array_filter([
                    'pageSize' => $page_size,
                    'paginationToken' => $pagination_token,
                ])
            );

        return $response;
    }

    public function generatePlacementOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        GeneratePlacementOptionsRequest $body,
    ): GeneratePlacementOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GeneratePlacementOptionsResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/placementOptions', (array) $body->toArrayObject());

        return $response;
    }

    public function confirmPlacementOption(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $placement_option_id,
    ): ConfirmPlacementOptionResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ConfirmPlacementOptionResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/placementOptions/' . $placement_option_id . '/confirmation', []);

        return $response;
    }

    public function getShipment(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
    ): GetShipmentResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GetShipmentResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id);

        return $response;
    }

    public function getDeliveryChallanDocument(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
    ): GetDeliveryChallanDocumentResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GetDeliveryChallanDocumentResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryChallanDocument');

        return $response;
    }

    public function updateShipmentDeliveryWindow(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
        UpdateShipmentDeliveryWindowRequest $body,
    ): UpdateShipmentDeliveryWindowResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(UpdateShipmentDeliveryWindowResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/deliveryWindow', (array) $body->toArrayObject());

        return $response;
    }

    public function getSelfShipAppointmentSlots(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
        #[RuleValidator(['integer', 'min:1', 'max:100'])]
        ?int $page_size = null,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token = null,
    ): GetSelfShipAppointmentSlotsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GetSelfShipAppointmentSlotsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/selfShipAppointmentSlots', array_filter([
                'pageSize' => $page_size,
                'paginationToken' => $pagination_token,
            ]));

        return $response;
    }

    public function generateSelfShipAppointmentSlots(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
        GeneratePlacementOptionsRequest $body,
    ): GenerateSelfShipAppointmentSlotsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GenerateSelfShipAppointmentSlotsResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/shipments/' . $shipment_id . '/selfShipAppointmentSlots', (array) $body->toArrayObject());

        return $response;
    }

    public function cancelSelfShipAppointmentSlots(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
        #[RuleValidator(['size:38'])]
        string $slot_id,
        CancelSelfShipAppointmentRequest $body,
    ): CancelSelfShipAppointmentResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(CancelSelfShipAppointmentResponse::class)
            ->put(
                $this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id
                    . '/shipments/' . $shipment_id
                    . '/selfShipAppointmentSlots/' . $slot_id
                    . '/cancellation',
                (array) $body->toArrayObject(),
            );

        return $response;
    }

    public function scheduleSelfShipAppointment(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
        #[RuleValidator(['size:38'])]
        string $slot_id,
        ScheduleSelfShipAppointmentRequest $body,
    ): ScheduleSelfShipAppointmentResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ScheduleSelfShipAppointmentResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id
                    . '/shipments/' . $shipment_id
                    . '/selfShipAppointmentSlots/' . $slot_id
                    . '/schedule',
                (array) $body->toArrayObject(),
            );

        return $response;
    }

    public function updateShipmentTrackingDetails(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
        UpdateShipmentTrackingDetailsRequest $body,
    ): UpdateShipmentTrackingDetailsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(UpdateShipmentTrackingDetailsResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id
                    . '/shipments/' . $shipment_id
                    . '/trackingDetails',
                (array) $body->toArrayObject(),
            );

        return $response;
    }

    public function listTransportationOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        #[RuleValidator(['integer', 'min:1', 'max:100'])]
        ?int $page_size,
        #[RuleValidator(['min:0', 'max:1024'])]
        ?string $pagination_token,
        #[RuleValidator(['size:38'])]
        string $placement_option_id,
        #[RuleValidator(['size:38'])]
        string $shipment_id,
    ): ListTransportationOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ListTransportationOptionsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/transportationOptions', array_filter([
                'pageSize' => $page_size,
                'paginationToken' => $pagination_token,
                'placementOptionId' => $placement_option_id,
                'shipmentId' => $shipment_id,
            ]));

        return $response;
    }

    public function generateTransportationOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        GenerateTransportationOptionsRequest $body,
    ): GenerateTransportationOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(GenerateTransportationOptionsResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/transportationOptions', (array) $body->toArrayObject());

        return $response;
    }

    public function confirmTransportationOptions(
        #[RuleValidator(['size:38'])]
        string $inbound_plan_id,
        ConfirmTransportationOptionsRequest $body,
    ): ConfirmTransportationOptionsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(ConfirmTransportationOptionsResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'inboundPlans/' . $inbound_plan_id . '/transportationOptions/confirmation', (array) $body->toArrayObject());

        return $response;
    }

    public function listItemComplianceDetails(
        #[RuleValidator(['array', 'min:1', 'max:100'])]
        array $mskus,
        string $marketplace_id,
    ): ListItemComplianceDetailsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());
        $this->validateIsArrayOfStrings($mskus);
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(ListItemComplianceDetailsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'items/compliance', array_filter([
                'mskus' => $mskus,
                'marketplaceId' => $marketplace_id,
            ]));

        return $response;
    }

    public function updateItemComplianceDetails(
        string $marketplace_id,
        UpdateItemComplianceDetailsRequest $body,
    ): UpdateItemComplianceDetailsResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(UpdateItemComplianceDetailsResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'items/compliance?marketplaceId=' . $marketplace_id, (array) $body->toArrayObject());

        return $response;
    }

    public function getInboundOperationStatus(
        #[RuleValidator(['min:36', 'max:38'])]
        string $operation_id,
    ): InboundOperationStatusResponse {
        $this->validateAttributes(__FUNCTION__, ...func_get_args());

        $response = $this->http
            ->responseClass(InboundOperationStatusResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'operations/' . $operation_id);

        return $response;
    }
}
