<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentPayments\SubmitInvoiceResponse;

class VendorDirectFulfillmentPaymentsResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function submitInvoice(
        array $request_body
    ): SubmitInvoiceResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitInvoiceResponse::class)
            ->post(
                $this->endpoint . '/vendor/directFulfillment/payments/v1/invoices',
                deep_array_conversion($request_body),
            );

        return $response;
    }
}
