<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentInbound\CreateInboundShipmentPlanRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\CreateInboundShipmentPlanResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound\GetInboundGuidanceResponse;
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
}
