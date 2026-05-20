<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\GetShipmentDetailsResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\GetShipmentLabelsResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\SubmitShipmentConfirmationsResponse;
use Jasara\AmznSPA\Data\Responses\VendorShipments\SubmitShipmentsResponse;

class VendorShipmentsResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function submitShipmentConfirmations(
        array $request_body
    ): SubmitShipmentConfirmationsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitShipmentConfirmationsResponse::class)
            ->post(
                $this->endpoint . '/vendor/shipping/v1/shipmentConfirmations',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getShipmentDetails(
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null,
        ?string $created_after = null,
        ?string $created_before = null,
        ?string $shipment_confirmed_before = null,
        ?string $shipment_confirmed_after = null,
        ?string $package_label_created_before = null,
        ?string $package_label_created_after = null,
        ?string $shipped_before = null,
        ?string $shipped_after = null,
        ?string $estimated_delivery_before = null,
        ?string $estimated_delivery_after = null,
        ?string $shipment_delivery_before = null,
        ?string $shipment_delivery_after = null,
        ?string $requested_pick_up_before = null,
        ?string $requested_pick_up_after = null,
        ?string $scheduled_pick_up_before = null,
        ?string $scheduled_pick_up_after = null,
        ?string $current_shipment_status = null,
        ?string $vendor_shipment_identifier = null,
        ?string $buyer_reference_number = null,
        ?string $buyer_warehouse_code = null,
        ?string $seller_warehouse_code = null
    ): GetShipmentDetailsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetShipmentDetailsResponse::class)
            ->get($this->endpoint . '/vendor/shipping/v1/shipments', $this->filterQuery([
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
                'createdAfter' => $created_after,
                'createdBefore' => $created_before,
                'shipmentConfirmedBefore' => $shipment_confirmed_before,
                'shipmentConfirmedAfter' => $shipment_confirmed_after,
                'packageLabelCreatedBefore' => $package_label_created_before,
                'packageLabelCreatedAfter' => $package_label_created_after,
                'shippedBefore' => $shipped_before,
                'shippedAfter' => $shipped_after,
                'estimatedDeliveryBefore' => $estimated_delivery_before,
                'estimatedDeliveryAfter' => $estimated_delivery_after,
                'shipmentDeliveryBefore' => $shipment_delivery_before,
                'shipmentDeliveryAfter' => $shipment_delivery_after,
                'requestedPickUpBefore' => $requested_pick_up_before,
                'requestedPickUpAfter' => $requested_pick_up_after,
                'scheduledPickUpBefore' => $scheduled_pick_up_before,
                'scheduledPickUpAfter' => $scheduled_pick_up_after,
                'currentShipmentStatus' => $current_shipment_status,
                'vendorShipmentIdentifier' => $vendor_shipment_identifier,
                'buyerReferenceNumber' => $buyer_reference_number,
                'buyerWarehouseCode' => $buyer_warehouse_code,
                'sellerWarehouseCode' => $seller_warehouse_code,
            ]));

        return $response;
    }

    public function submitShipments(
        array $request_body
    ): SubmitShipmentsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitShipmentsResponse::class)
            ->post(
                $this->endpoint . '/vendor/shipping/v1/shipments',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getShipmentLabels(
        ?int $limit = null,
        ?string $sort_order = null,
        ?string $next_token = null,
        ?string $label_created_after = null,
        ?string $label_created_before = null,
        ?string $buyer_reference_number = null,
        ?string $vendor_shipment_identifier = null,
        ?string $seller_warehouse_code = null
    ): GetShipmentLabelsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetShipmentLabelsResponse::class)
            ->get($this->endpoint . '/vendor/shipping/v1/transportLabels', $this->filterQuery([
                'limit' => $limit,
                'sortOrder' => $sort_order,
                'nextToken' => $next_token,
                'labelCreatedAfter' => $label_created_after,
                'labelCreatedBefore' => $label_created_before,
                'buyerReferenceNumber' => $buyer_reference_number,
                'vendorShipmentIdentifier' => $vendor_shipment_identifier,
                'sellerWarehouseCode' => $seller_warehouse_code,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
