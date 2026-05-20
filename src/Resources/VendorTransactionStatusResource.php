<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\VendorTransactionStatus\GetTransactionResponse;

class VendorTransactionStatusResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getTransaction(
        string $transaction_id
    ): GetTransactionResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetTransactionResponse::class)
            ->get($this->endpoint . '/vendor/transactions/v1/transactions/' . rawurlencode((string) $transaction_id));

        return $response;
    }
}
