<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorInvoices\SubmitInvoicesResponse;

class VendorInvoicesResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function submitInvoices(
        array $request_body
    ): SubmitInvoicesResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(SubmitInvoicesResponse::class)
            ->post(
                $this->endpoint . '/vendor/payments/v1/invoices',
                deep_array_conversion($request_body),
            );

        return $response;
    }
}
