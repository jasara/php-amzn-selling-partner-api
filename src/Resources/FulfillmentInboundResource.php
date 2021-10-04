<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\InboundShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\ConfirmPreorderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\ConfirmTransportResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\EstimateTransportResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetBillOfLadingResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetLabelsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetPreorderInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetPrepInstructionsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetShipmentItemsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetShipmentsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetTransportDetailsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\InboundShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\PutTransportDetailsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\VoidTransportResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentInboundResource implements ResourceContract
{
    use ValidatesParameters;

    const BASE_PATH = '/fba/inbound/v0/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getInboundGuidance(string $marketplace_id, array $seller_sku_list = [], array $asin_list = []): GetInboundGuidanceResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateIsArrayOfStrings($seller_sku_list);
        $this->validateIsArrayOfStrings($asin_list);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'itemsGuidance', array_filter([
            'MarketplaceId' => $marketplace_id,
            'SellerSKUList' => $seller_sku_list,
            'ASINList' => $asin_list,
        ]));

        return new GetInboundGuidanceResponse($response);
    }

    public function createInboundShipmentPlan(CreateInboundShipmentPlanRequest $request): CreateInboundShipmentPlanResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'plans', (array) $request->toArrayObject());

        return new CreateInboundShipmentPlanResponse($response);
    }

    public function updateInboundShipment(string $shipment_id, InboundShipmentRequest $request): InboundShipmentResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id, (array) $request->toArrayObject());

        return new InboundShipmentResponse($response);
    }

    public function createInboundShipment(string $shipment_id, InboundShipmentRequest $request): InboundShipmentResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id, (array) $request->toArrayObject());

        return new InboundShipmentResponse($response);
    }

    public function getPreorderInfo(string $shipment_id, string $marketplace_id): GetPreorderInfoResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/preorder', [
            'MarketplaceId' => $marketplace_id,
        ]);

        return new GetPreorderInfoResponse($response);
    }

    public function confirmPreorder(string $shipment_id, string $marketplace_id, CarbonImmutable $need_by_date): ConfirmPreorderResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/preorder/confirm', [
            'MarketplaceId' => $marketplace_id,
            'NeedByDate' => $need_by_date->toDateString(),
        ]);

        return new ConfirmPreorderResponse($response);
    }

    public function getPrepInstructions(string $ship_to_country_code, array $seller_sku_list = [], array $asin_list = []): GetPrepInstructionsResponse
    {
        $this->validateStringEnum($ship_to_country_code, MarketplacesList::allCountryCodes());
        $this->validateIsArrayOfStrings($seller_sku_list);
        $this->validateIsArrayOfStrings($asin_list);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'prepInstructions', array_filter([
            'ShipToCountryCode' => $ship_to_country_code,
            'SellerSKUList' => $seller_sku_list,
            'ASINList' => $asin_list,
        ]));

        return new GetPrepInstructionsResponse($response);
    }

    public function getTransportDetails(string $shipment_id): GetTransportDetailsResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport');

        return new GetTransportDetailsResponse($response);
    }

    public function putTransportDetails(string $shipment_id, PutTransportDetailsRequest $request): PutTransportDetailsResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport', (array) $request->toArrayObject());

        return new PutTransportDetailsResponse($response);
    }

    public function voidTransport(string $shipment_id): VoidTransportResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport/void', []);

        return new VoidTransportResponse($response);
    }

    public function estimateTransport(string $shipment_id): EstimateTransportResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport/estimate', []);

        return new EstimateTransportResponse($response);
    }

    public function confirmTransport(string $shipment_id): ConfirmTransportResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport/confirm', []);

        return new ConfirmTransportResponse($response);
    }

    public function getLabels(
        string $shipment_id,
        string $page_type,
        string $label_type,
        int $number_of_packages = null,
        array $package_labels_to_print = [],
        int $number_of_pallets = null,
        int $page_size = null,
        int $page_start_index = null
    ): GetLabelsResponse {
        $this->validateStringEnum($page_type, AmazonEnums::PAGE_TYPES);
        $this->validateStringEnum($label_type, ['BARCODE_2D', 'UNIQUE', 'PALLET']);
        $this->validateIsArrayOfStrings($package_labels_to_print);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/labels', array_filter([
            'PageType' => $page_type,
            'LabelType' => $label_type,
            'NumberOfPackages' => $number_of_packages,
            'PackageLabelsToPrint' => $package_labels_to_print,
            'NumberOfPallets' => $number_of_pallets,
            'PageSize' => $page_size,
            'PageStartIndex' => $page_start_index,
        ]));

        return new GetLabelsResponse($response);
    }

    public function getBillOfLading(string $shipment_id): GetBillOfLadingResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/billOfLading');

        return new GetBillOfLadingResponse($response);
    }

    public function getShipments(
        string $marketplace_id,
        string $query_type,
        array $shipment_status_list = [],
        array $shipment_id_list = [],
        CarbonImmutable $last_updated_after = null,
        CarbonImmutable $last_updated_before = null,
        string $next_token = null,
    ): GetShipmentsResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateStringEnum($query_type, ['SHIPMENT', 'DATE_RANGE', 'NEXT_TOKEN']);
        $this->validateIsArrayOfStrings($shipment_status_list, AmazonEnums::SHIPMENT_STATUSES);
        $this->validateIsArrayOfStrings($shipment_id_list);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments', array_filter([
            'MarketplaceId' => $marketplace_id,
            'QueryType' => $query_type,
            'ShipmentStatusList' => $shipment_status_list,
            'ShipmentIdList' => $shipment_id_list,
            'LastUpdatedAfter' => $last_updated_after?->toIso8601String(),
            'LastUpdatedBefore' => $last_updated_before?->toIso8601String(),
            'NextToken' => $next_token,
        ]));

        return new GetShipmentsResponse($response);
    }

    public function getShipmentItemsByShipmentId(string $shipment_id, string $marketplace_id): GetShipmentItemsResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/items', [
            'MarketplaceId' => $marketplace_id,
        ]);

        return new GetShipmentItemsResponse($response);
    }

    public function getShipmentItems(
        string $marketplace_id,
        string $query_type,
        CarbonImmutable $last_updated_after = null,
        CarbonImmutable $last_updated_before = null,
        string $next_token = null,
    ): GetShipmentItemsResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateStringEnum($query_type, ['DATE_RANGE', 'NEXT_TOKEN']);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'shipmentItems', array_filter([
            'MarketplaceId' => $marketplace_id,
            'QueryType' => $query_type,
            'LastUpdatedAfter' => $last_updated_after?->toIso8601String(),
            'LastUpdatedBefore' => $last_updated_before?->toIso8601String(),
            'NextToken' => $next_token,
        ]));

        return new GetShipmentItemsResponse($response);
    }
}
