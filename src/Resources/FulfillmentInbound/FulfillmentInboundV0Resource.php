<?php

namespace Jasara\AmznSPA\Resources\FulfillmentInbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\InboundShipmentRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentInbound\PutTransportDetailsRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\ConfirmPreorderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\ConfirmTransportResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\EstimateTransportResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetBillOfLadingResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetInboundGuidanceResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetLabelsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetPreorderInfoResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetPrepInstructionsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetShipmentItemsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetShipmentsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\GetTransportDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\InboundShipmentResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\PutTransportDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentInbound\v0\VoidTransportResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentInboundV0Resource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/fba/inbound/v0/';

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

        $response = $this->http
            ->responseClass(GetInboundGuidanceResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'itemsGuidance', array_filter([
                'MarketplaceId' => $marketplace_id,
                'SellerSKUList' => $seller_sku_list,
                'ASINList' => $asin_list,
            ]));

        return $response;
    }

    public function createInboundShipmentPlan(CreateInboundShipmentPlanRequest $request): CreateInboundShipmentPlanResponse
    {
        $response = $this->http
            ->responseClass(CreateInboundShipmentPlanResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'plans', (array) $request->toArrayObject());

        return $response;
    }

    public function updateInboundShipment(string $shipment_id, InboundShipmentRequest $request): InboundShipmentResponse
    {
        $response = $this->http
            ->responseClass(InboundShipmentResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id, (array) $request->toArrayObject());

        return $response;
    }

    public function createInboundShipment(string $shipment_id, InboundShipmentRequest $request): InboundShipmentResponse
    {
        $response = $this->http
            ->responseClass(InboundShipmentResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id, (array) $request->toArrayObject());

        return $response;
    }

    public function getPreorderInfo(string $shipment_id, string $marketplace_id): GetPreorderInfoResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(GetPreorderInfoResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/preorder', [
                'MarketplaceId' => $marketplace_id,
            ]);

        return $response;
    }

    public function confirmPreorder(string $shipment_id, string $marketplace_id, CarbonImmutable $need_by_date): ConfirmPreorderResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(ConfirmPreorderResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/preorder/confirm', [
                'MarketplaceId' => $marketplace_id,
                'NeedByDate' => $need_by_date->toDateString(),
            ]);

        return $response;
    }

    public function getPrepInstructions(string $ship_to_country_code, array $seller_sku_list = [], array $asin_list = []): GetPrepInstructionsResponse
    {
        $this->validateStringEnum($ship_to_country_code, MarketplacesList::allCountryCodes());
        $this->validateIsArrayOfStrings($seller_sku_list);
        $this->validateIsArrayOfStrings($asin_list);

        $response = $this->http
            ->responseClass(GetPrepInstructionsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'prepInstructions', array_filter([
                'ShipToCountryCode' => $ship_to_country_code,
                'SellerSKUList' => $seller_sku_list,
                'ASINList' => $asin_list,
            ]));

        return $response;
    }

    public function getTransportDetails(string $shipment_id): GetTransportDetailsResponse
    {
        $response = $this->http
            ->responseClass(GetTransportDetailsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport');

        return $response;
    }

    public function putTransportDetails(string $shipment_id, PutTransportDetailsRequest $request): PutTransportDetailsResponse
    {
        $response = $this->http
            ->responseClass(PutTransportDetailsResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport', (array) $request->toArrayObject());

        return $response;
    }

    public function voidTransport(string $shipment_id): VoidTransportResponse
    {
        $response = $this->http
            ->responseClass(VoidTransportResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport/void', []);

        return $response;
    }

    public function estimateTransport(string $shipment_id): EstimateTransportResponse
    {
        $response = $this->http
            ->responseClass(EstimateTransportResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport/estimate', []);

        return $response;
    }

    public function confirmTransport(string $shipment_id): ConfirmTransportResponse
    {
        $response = $this->http
            ->responseClass(ConfirmTransportResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/transport/confirm', []);

        return $response;
    }

    public function getLabels(
        string $shipment_id,
        string $page_type,
        string $label_type,
        ?int $number_of_packages = null,
        array $package_labels_to_print = [],
        ?int $number_of_pallets = null,
        ?int $page_size = null,
        ?int $page_start_index = null
    ): GetLabelsResponse {
        $this->validateStringEnum($page_type, AmazonEnums::PAGE_TYPES);
        $this->validateStringEnum($label_type, ['BARCODE_2D', 'UNIQUE', 'PALLET', 'DEFAULT']);
        $this->validateIsArrayOfStrings($package_labels_to_print);

        $response = $this->http
            ->responseClass(GetLabelsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/labels', array_filter([
                'PageType' => $page_type,
                'LabelType' => $label_type,
                'NumberOfPackages' => $number_of_packages,
                'PackageLabelsToPrint' => $package_labels_to_print,
                'NumberOfPallets' => $number_of_pallets,
                'PageSize' => $page_size,
                'PageStartIndex' => $page_start_index,
            ]));

        return $response;
    }

    public function getBillOfLading(string $shipment_id): GetBillOfLadingResponse
    {
        $response = $this->http
            ->responseClass(GetBillOfLadingResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/billOfLading');

        return $response;
    }

    public function getShipments(
        string $marketplace_id,
        string $query_type,
        array $shipment_status_list = [],
        array $shipment_id_list = [],
        ?CarbonImmutable $last_updated_after = null,
        ?CarbonImmutable $last_updated_before = null,
        ?string $next_token = null,
    ): GetShipmentsResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateStringEnum($query_type, ['SHIPMENT', 'DATE_RANGE', 'NEXT_TOKEN']);
        $this->validateIsArrayOfStrings($shipment_status_list, AmazonEnums::SHIPMENT_STATUSES);
        $this->validateIsArrayOfStrings($shipment_id_list);

        $response = $this->http
            ->responseClass(GetShipmentsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments', array_filter([
                'MarketplaceId' => $marketplace_id,
                'QueryType' => $query_type,
                'ShipmentStatusList' => $shipment_status_list,
                'ShipmentIdList' => $shipment_id_list,
                'LastUpdatedAfter' => $last_updated_after?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'LastUpdatedBefore' => $last_updated_before?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'NextToken' => $next_token,
            ]));

        return $response;
    }

    public function getShipmentItemsByShipmentId(string $shipment_id, string $marketplace_id): GetShipmentItemsResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());

        $response = $this->http
            ->responseClass(GetShipmentItemsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id . '/items', [
                'MarketplaceId' => $marketplace_id,
            ]);

        return $response;
    }

    public function getShipmentItems(
        string $marketplace_id,
        string $query_type,
        ?CarbonImmutable $last_updated_after = null,
        ?CarbonImmutable $last_updated_before = null,
        ?string $next_token = null,
    ): GetShipmentItemsResponse {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $this->validateStringEnum($query_type, ['DATE_RANGE', 'NEXT_TOKEN']);

        $response = $this->http
            ->responseClass(GetShipmentItemsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'shipmentItems', array_filter([
                'MarketplaceId' => $marketplace_id,
                'QueryType' => $query_type,
                'LastUpdatedAfter' => $last_updated_after?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'LastUpdatedBefore' => $last_updated_before?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'NextToken' => $next_token,
            ]));

        return $response;
    }
}
