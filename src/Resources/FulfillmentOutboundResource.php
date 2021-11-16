<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\CreateFulfillmentOrderRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\CreateFulfillmentReturnRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\GetFulfillmentPreviewRequest;
use Jasara\AmznSPA\DataTransferObjects\Requests\FulfillmentOutbound\UpdateFulfillmentOrderRequest;
use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\CreateFulfillmentReturnResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFeatureInventoryResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFeatureSkuResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFeaturesResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFulfillmentOrderResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetFulfillmentPreviewResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\GetPackageTrackingDetailsResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\ListAllFulfillmentOrdersResponse;
use Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound\ListReturnReasonCodesResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FulfillmentOutboundResource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/fba/outbound/2020-07-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getFulfillmentPreview(GetFulfillmentPreviewRequest $request): GetFulfillmentPreviewResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/preview', (array) $request->toArrayObject());

        return new GetFulfillmentPreviewResponse($response);
    }

    public function listAllFulfillmentOrders(?CarbonImmutable $query_start_date = null, ?string $next_token = null): ListAllFulfillmentOrdersResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'fulfillmentOrders', [
            'queryStartDate'=> $query_start_date->toDateString(),
            'nextToken'=>$next_token,
        ]);

        return new ListAllFulfillmentOrdersResponse($response);
    }

    public function createFulfillmentOrder(CreateFulfillmentOrderRequest $request): BaseResponse
    {
        $response = $this->http->post($this->endpoint . self::BASE_PATH . 'fulfillmentOrders', (array) $request->toArrayObject());

        return new BaseResponse($response);
    }

    public function getPackageTrackingDetails(int $package_number): GetPackageTrackingDetailsResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'tracking');

        return new GetPackageTrackingDetailsResponse($response);
    }

    public function listReturnReasonCodes(string $seller_sku, ?string $marketplace_id, ?string $seller_fulfillment_order_id, string $language): ListReturnReasonCodesResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'returnReasonCodes', array_filter([
            'MarketplaceId' => $marketplace_id,
            'sellerSku' => $seller_sku,
            'sellerFulfillmentOrderId'=> $seller_fulfillment_order_id,
            'language' => $language,
        ]));

        return new ListReturnReasonCodesResponse($response);
    }

    public function createFulfillmentReturn(string $seller_fulfillment_order_id, CreateFulfillmentReturnRequest $request): CreateFulfillmentReturnResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id . '/return', []);

        return new CreateFulfillmentReturnResponse($response);
    }

    public function getFulfillmentOrder(string $seller_fulfillment_order_id): GetFulfillmentOrderResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id);

        return new GetFulfillmentOrderResponse($response);
    }

    public function updateFulfillmentOrder(UpdateFulfillmentOrderRequest $request, string $seller_fulfillment_order_id): BaseResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id, []);

        return new BaseResponse($response);
    }

    public function cancelFulfillmentOrder(string $seller_fulfillment_order_id): BaseResponse
    {
        $response = $this->http->put($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id . '/cancel', []);

        return new BaseResponse($response);
    }

    public function getFeatures(string $marketplace_id): GetFeaturesResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'features');

        return new GetFeaturesResponse($response);
    }

    public function getFeatureInventory(string $marketplace_id, string $feature_name, ?string $next_token = null): GetFeatureInventoryResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'features/inventory/' . $feature_name);

        return new GetFeatureInventoryResponse($response);
    }

    public function getFeatureSKU(string $marketplace_id, string $feature_name, ?string $seller_sku): GetFeatureSkuResponse
    {
        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'features/inventory/' . $feature_name . '/' . $seller_sku);

        return new GetFeatureSkuResponse($response);
    }
}
