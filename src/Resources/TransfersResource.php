<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Transfers\GetPaymentMethodsResponse;
use Jasara\AmznSPA\Data\Responses\Transfers\InitiatePayoutResponse;

class TransfersResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function initiatePayout(
        array $request_body
    ): InitiatePayoutResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(InitiatePayoutResponse::class)
            ->post(
                $this->endpoint . '/finances/transfers/2024-06-01/payouts',
                deep_array_conversion($request_body),
            );

        return $response;
    }

    public function getPaymentMethods(
        string $marketplace_id,
        ?array $payment_method_types = null
    ): GetPaymentMethodsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetPaymentMethodsResponse::class)
            ->get($this->endpoint . '/finances/transfers/2024-06-01/paymentMethods', $this->filterQuery([
                'marketplaceId' => $marketplace_id,
                'paymentMethodTypes' => $payment_method_types,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
