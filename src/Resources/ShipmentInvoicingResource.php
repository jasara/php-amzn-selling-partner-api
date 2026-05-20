<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\ShipmentInvoicing\GetInvoiceStatusResponse;
use Jasara\AmznSPA\Data\Responses\ShipmentInvoicing\GetShipmentDetailsResponse;
use Jasara\AmznSPA\Data\Responses\ShipmentInvoicing\SubmitInvoiceResponse;

class ShipmentInvoicingResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getShipmentDetails(
        string $shipment_id
    ): GetShipmentDetailsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetShipmentDetailsResponse::class)
            ->get($this->endpoint . '/fba/outbound/brazil/v0/shipments/' . rawurlencode((string) $shipment_id));

        return $response;
    }

    public function submitInvoice(
        string $shipment_id,
        array $request_body
    ): SubmitInvoiceResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitInvoiceResponse::class)
            ->post(
                $this->endpoint . '/fba/outbound/brazil/v0/shipments/' . rawurlencode((string) $shipment_id) . '/invoice',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getInvoiceStatus(
        string $shipment_id
    ): GetInvoiceStatusResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetInvoiceStatusResponse::class)
            ->get($this->endpoint . '/fba/outbound/brazil/v0/shipments/' . rawurlencode((string) $shipment_id) . '/invoice/status');

        return $response;
    }
}
