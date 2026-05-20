<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\ListingsRestrictions\GetListingsRestrictionsResponse;

class ListingsRestrictionsResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getListingsRestrictions(
        string $asin,
        string $seller_id,
        array $marketplace_ids,
        ?string $condition_type = null,
        ?string $reason_locale = null
    ): GetListingsRestrictionsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetListingsRestrictionsResponse::class)
            ->get($this->endpoint . '/listings/2021-08-01/restrictions', $this->filterQuery([
                'asin' => $asin,
                'sellerId' => $seller_id,
                'marketplaceIds' => $marketplace_ids,
                'conditionType' => $condition_type,
                'reasonLocale' => $reason_locale,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
