<?php

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Constants\MarketplacesList;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\DataTransferObjects\Responses\FbaInventory\GetInventorySummariesResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class FbaInventoryResource implements ResourceContract
{
    use ValidatesParameters;

    const BASE_PATH = '/fba/inventory/v1/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function getInventorySummaries(
        string $granularity_type,
        string $granularity_id,
        array $marketplace_ids,
        ?bool $details = null,
        ?CarbonImmutable $start_date_time = null,
        ?array $seller_skus = null,
        ?string $next_token = null,
    ): GetInventorySummariesResponse {
        $this->validateStringEnum($granularity_type, ['Marketplace']);
        if ($seller_skus) {
            $this->validateIsArrayOfStrings($seller_skus);
        }
        $this->validateIsArrayOfStrings($marketplace_ids, MarketplacesList::allIdentifiers());

        $response = $this->http->get($this->endpoint . self::BASE_PATH . 'summaries', array_filter([
            'details' => $details,
            'granularityType' => $granularity_type,
            'granularityId' => $granularity_id,
            'startDateTime' => $start_date_time?->toIso8601String(),
            'sellerSkus' => $seller_skus,
            'nextToken' => $next_token,
            'marketplaceIds' => $marketplace_ids,
        ]));

        return new GetInventorySummariesResponse($response);
    }
}
