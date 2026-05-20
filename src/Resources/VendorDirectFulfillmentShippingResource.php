<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetCustomerInvoiceResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetCustomerInvoicesResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetPackingSlipResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetPackingSlipsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetShippingLabelResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\GetShippingLabelsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\SubmitShipmentConfirmationsResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\SubmitShipmentStatusUpdatesResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping\SubmitShippingLabelRequestResponse;

class VendorDirectFulfillmentShippingResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getShippingLabels(
        string $created_after,
        string $created_before,
        ?string $ship_from_party_id = null,
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null
    ): GetShippingLabelsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetShippingLabelsResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/shipping/v1/shippingLabels', $this->filterQuery([
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'shipFromPartyId' => $ship_from_party_id,
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
            ]));

        return $response;
    }

    public function submitShippingLabelRequest(
        array $request_body
    ): SubmitShippingLabelRequestResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitShippingLabelRequestResponse::class)
            ->post(
                $this->endpoint . '/vendor/directFulfillment/shipping/v1/shippingLabels',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getShippingLabel(
        string $purchase_order_number
    ): GetShippingLabelResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetShippingLabelResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/shipping/v1/shippingLabels/' . rawurlencode((string) $purchase_order_number));

        return $response;
    }

    public function submitShipmentConfirmations(
        array $request_body
    ): SubmitShipmentConfirmationsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitShipmentConfirmationsResponse::class)
            ->post(
                $this->endpoint . '/vendor/directFulfillment/shipping/v1/shipmentConfirmations',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function submitShipmentStatusUpdates(
        array $request_body
    ): SubmitShipmentStatusUpdatesResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitShipmentStatusUpdatesResponse::class)
            ->post(
                $this->endpoint . '/vendor/directFulfillment/shipping/v1/shipmentStatusUpdates',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getCustomerInvoices(
        string $created_after,
        string $created_before,
        ?string $ship_from_party_id = null,
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null
    ): GetCustomerInvoicesResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetCustomerInvoicesResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/shipping/v1/customerInvoices', $this->filterQuery([
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'shipFromPartyId' => $ship_from_party_id,
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
            ]));

        return $response;
    }

    public function getCustomerInvoice(
        string $purchase_order_number
    ): GetCustomerInvoiceResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetCustomerInvoiceResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/shipping/v1/customerInvoices/' . rawurlencode((string) $purchase_order_number));

        return $response;
    }

    public function getPackingSlips(
        string $created_after,
        string $created_before,
        ?string $ship_from_party_id = null,
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null
    ): GetPackingSlipsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetPackingSlipsResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/shipping/v1/packingSlips', $this->filterQuery([
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'shipFromPartyId' => $ship_from_party_id,
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
            ]));

        return $response;
    }

    public function getPackingSlip(
        string $purchase_order_number
    ): GetPackingSlipResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetPackingSlipResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/shipping/v1/packingSlips/' . rawurlencode((string) $purchase_order_number));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
