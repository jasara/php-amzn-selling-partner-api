<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Finances\ListTransactionsResponse;

class FinancesResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function listTransactions(
        ?string $posted_after = null,
        ?string $posted_before = null,
        ?string $marketplace_id = null,
        ?string $transaction_status = null,
        ?string $related_identifier_name = null,
        ?string $related_identifier_value = null,
        ?string $next_token = null
    ): ListTransactionsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ListTransactionsResponse::class)
            ->get($this->endpoint . '/finances/2024-06-19/transactions', $this->filterQuery([
                'postedAfter' => $posted_after,
                'postedBefore' => $posted_before,
                'marketplaceId' => $marketplace_id,
                'transactionStatus' => $transaction_status,
                'relatedIdentifierName' => $related_identifier_name,
                'relatedIdentifierValue' => $related_identifier_value,
                'nextToken' => $next_token,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
