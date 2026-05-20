<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders\GetOrderResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders\GetOrdersResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentOrders\SubmitAcknowledgementResponse;

class VendorDirectFulfillmentOrdersResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getOrders(
        string $created_after,
        string $created_before,
        ?string $ship_from_party_id = null,
        ?string $status = null,
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null,
        ?string $include_details = null
    ): GetOrdersResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetOrdersResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/orders/v1/purchaseOrders', $this->filterQuery([
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'shipFromPartyId' => $ship_from_party_id,
                'status' => $status,
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
                'includeDetails' => $include_details,
            ]));

        return $response;
    }

    public function getOrder(
        string $purchase_order_number
    ): GetOrderResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetOrderResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/orders/v1/purchaseOrders/' . rawurlencode((string) $purchase_order_number));

        return $response;
    }

    public function submitAcknowledgement(
        array $request_body
    ): SubmitAcknowledgementResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitAcknowledgementResponse::class)
            ->post(
                $this->endpoint . '/vendor/directFulfillment/orders/v1/acknowledgements',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
