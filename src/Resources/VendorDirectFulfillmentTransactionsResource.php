<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentTransactions\GetTransactionStatusResponse;

class VendorDirectFulfillmentTransactionsResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getTransactionStatus(
        string $transaction_id
    ): GetTransactionStatusResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetTransactionStatusResponse::class)
            ->get($this->endpoint . '/vendor/directFulfillment/transactions/v1/transactions/' . rawurlencode((string) $transaction_id));

        return $response;
    }
}
