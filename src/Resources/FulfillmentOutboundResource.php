<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\CreateFulfillmentOrderRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\CreateFulfillmentReturnRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\GetFulfillmentPreviewRequest;
use Jasara\AmznSPA\Data\Requests\FulfillmentOutbound\UpdateFulfillmentOrderRequest;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CancelFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CreateFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\CreateFulfillmentReturnResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFeatureInventoryResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFeatureSkuResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFeaturesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFulfillmentOrderResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetFulfillmentPreviewResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\GetPackageTrackingDetailsResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\ListAllFulfillmentOrdersResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\ListReturnReasonCodesResponse;
use Jasara\AmznSPA\Data\Responses\FulfillmentOutbound\UpdateFulfillmentOrderResponse;
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
        $response = $this->http
            ->responseClass(GetFulfillmentPreviewResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/preview', (array) $request->toArrayObject());

        return $response;
    }

    public function listAllFulfillmentOrders(?CarbonImmutable $query_start_date = null, ?string $next_token = null): ListAllFulfillmentOrdersResponse
    {
        $response = $this->http
            ->responseClass(ListAllFulfillmentOrdersResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'fulfillmentOrders', [
                'queryStartDate' => $query_start_date->toDateString(),
                'nextToken' => $next_token,
            ]);

        return $response;
    }

    public function createFulfillmentOrder(CreateFulfillmentOrderRequest $request): CreateFulfillmentOrderResponse
    {
        $response = $this->http
            ->responseClass(CreateFulfillmentOrderResponse::class)
            ->post($this->endpoint . self::BASE_PATH . 'fulfillmentOrders', (array) $request->toArrayObject());

        return $response;
    }

    public function getPackageTrackingDetails(int $package_number): GetPackageTrackingDetailsResponse
    {
        $response = $this->http
            ->responseClass(GetPackageTrackingDetailsResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'tracking');

        return $response;
    }

    public function listReturnReasonCodes(string $seller_sku, ?string $marketplace_id, ?string $seller_fulfillment_order_id, string $language): ListReturnReasonCodesResponse
    {
        $this->validateStringEnum($marketplace_id, MarketplacesList::allIdentifiers());
        $response = $this->http
            ->responseClass(ListReturnReasonCodesResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'returnReasonCodes', array_filter([
                'MarketplaceId' => $marketplace_id,
                'sellerSku' => $seller_sku,
                'sellerFulfillmentOrderId' => $seller_fulfillment_order_id,
                'language' => $language,
            ]));

        return $response;
    }

    public function createFulfillmentReturn(string $seller_fulfillment_order_id, CreateFulfillmentReturnRequest $request): CreateFulfillmentReturnResponse
    {
        $response = $this->http
            ->responseClass(CreateFulfillmentReturnResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id . '/return', (array) $request->toArrayObject());

        return $response;
    }

    public function getFulfillmentOrder(string $seller_fulfillment_order_id): GetFulfillmentOrderResponse
    {
        $response = $this->http
            ->responseClass(GetFulfillmentOrderResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id);

        return $response;
    }

    public function updateFulfillmentOrder(UpdateFulfillmentOrderRequest $request, string $seller_fulfillment_order_id): UpdateFulfillmentOrderResponse
    {
        $response = $this->http
            ->responseClass(UpdateFulfillmentOrderResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id, (array) $request->toArrayObject());

        return $response;
    }

    public function cancelFulfillmentOrder(string $seller_fulfillment_order_id): CancelFulfillmentOrderResponse
    {
        $response = $this->http
            ->responseClass(CancelFulfillmentOrderResponse::class)
            ->put($this->endpoint . self::BASE_PATH . 'fulfillmentOrders/' . $seller_fulfillment_order_id . '/cancel', []);

        return $response;
    }

    public function getFeatures(string $marketplace_id): GetFeaturesResponse
    {
        $response = $this->http
            ->responseClass(GetFeaturesResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'features');

        return $response;
    }

    public function getFeatureInventory(string $marketplace_id, string $feature_name, ?string $next_token = null): GetFeatureInventoryResponse
    {
        $response = $this->http
            ->responseClass(GetFeatureInventoryResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'features/inventory/' . $feature_name);

        return $response;
    }

    public function getFeatureSKU(string $marketplace_id, string $feature_name, ?string $seller_sku): GetFeatureSkuResponse
    {
        $response = $this->http
            ->responseClass(GetFeatureSkuResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'features/inventory/' . $feature_name . '/' . rawurlencode($seller_sku));

        return $response;
    }
}
