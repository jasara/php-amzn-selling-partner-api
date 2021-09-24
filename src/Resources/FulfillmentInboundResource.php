<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\InboundShipmentRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\ConfirmPreorderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetPreorderInfoResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\InboundShipmentResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\GetPrepInstructionsResultSchema;
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
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'createInboundShipmentPlan', [
            'body' => $request->toArray(),
        ]);

        return new CreateInboundShipmentPlanResponse($response);
    }

    public function updateInboundShipment(string $shipment_id, InboundShipmentRequest $request): InboundShipmentResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id, [
            'body' => $request->toArray(),
        ]);

        return new InboundShipmentResponse($response);
    }

    public function createInboundShipment(string $shipment_id, InboundShipmentRequest $request): InboundShipmentResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'shipments/' . $shipment_id, [
            'body' => $request->toArray(),
        ]);

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

    public function getPrepInstructions(string $ship_to_country_code, array $seller_sku_list = [], array $asin_list = []): GetPrepInstructionsResultSchema
    {
        $this->validateStringEnum($ship_to_country_code, MarketplacesList::allCountryCodes());
        $this->validateIsArrayOfStrings($seller_sku_list);
        $this->validateIsArrayOfStrings($asin_list);

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'prepInstructions', array_filter([
            'ShipToCountryCode' => $ship_to_country_code,
            'SellerSKUList' => $seller_sku_list,
            'ASINList' => $asin_list,
        ]));

        return new GetPrepInstructionsResultSchema($response);
    }
}
