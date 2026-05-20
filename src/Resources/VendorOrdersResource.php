<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\GetPurchaseOrderResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\GetPurchaseOrdersResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\GetPurchaseOrdersStatusResponse;
use Jasara\AmznSPA\Data\Responses\VendorOrders\SubmitAcknowledgementResponse;

class VendorOrdersResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getPurchaseOrders(
        ?int $limit = null,
        ?string $created_after = null,
        ?string $created_before = null,
        ?string $sort_order = null,
        ?string $next_token = null,
        ?string $include_details = null,
        ?string $changed_after = null,
        ?string $changed_before = null,
        ?string $po_item_state = null,
        ?string $is_po_changed = null,
        ?string $purchase_order_state = null,
        ?string $ordering_vendor_code = null
    ): GetPurchaseOrdersResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetPurchaseOrdersResponse::class)
            ->get($this->endpoint . '/vendor/orders/v1/purchaseOrders', $this->filterQuery([
                'limit' => $limit,
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
                'includeDetails' => $include_details,
                'changedAfter' => $changed_after,
                'changedBefore' => $changed_before,
                'poItemState' => $po_item_state,
                'isPOChanged' => $is_po_changed,
                'purchaseOrderState' => $purchase_order_state,
                'orderingVendorCode' => $ordering_vendor_code,
            ]));

        return $response;
    }

    public function getPurchaseOrder(
        string $purchase_order_number
    ): GetPurchaseOrderResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetPurchaseOrderResponse::class)
            ->get($this->endpoint . '/vendor/orders/v1/purchaseOrders/' . rawurlencode((string) $purchase_order_number));

        return $response;
    }

    public function submitAcknowledgement(
        array $request_body
    ): SubmitAcknowledgementResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitAcknowledgementResponse::class)
            ->post(
                $this->endpoint . '/vendor/orders/v1/acknowledgements',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getPurchaseOrdersStatus(
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null,
        ?string $created_after = null,
        ?string $created_before = null,
        ?string $updated_after = null,
        ?string $updated_before = null,
        ?string $purchase_order_number = null,
        ?string $purchase_order_status = null,
        ?string $item_confirmation_status = null,
        ?string $item_receive_status = null,
        ?string $ordering_vendor_code = null,
        ?string $ship_to_party_id = null
    ): GetPurchaseOrdersStatusResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetPurchaseOrdersStatusResponse::class)
            ->get($this->endpoint . '/vendor/orders/v1/purchaseOrdersStatus', $this->filterQuery([
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'updatedAfter' => $updated_after,
                'updatedBefore' => $updated_before,
                'purchaseOrderNumber' => $purchase_order_number,
                'purchaseOrderStatus' => $purchase_order_status,
                'itemConfirmationStatus' => $item_confirmation_status,
                'itemReceiveStatus' => $item_receive_status,
                'orderingVendorCode' => $ordering_vendor_code,
                'shipToPartyId' => $ship_to_party_id,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
