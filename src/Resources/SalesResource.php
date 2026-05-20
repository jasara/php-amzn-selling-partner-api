<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Sales\GetOrderMetricsResponse;

class SalesResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getOrderMetrics(
        array $marketplace_ids,
        string $interval,
        string $granularity,
        ?string $granularity_time_zone = null,
        ?string $buyer_type = null,
        ?string $fulfillment_network = null,
        ?string $first_day_of_week = null,
        ?string $asin = null,
        ?string $sku = null,
        ?string $amazon_program = null
    ): GetOrderMetricsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetOrderMetricsResponse::class)
            ->get($this->endpoint . '/sales/v1/orderMetrics', $this->filterQuery([
                'marketplaceIds' => $marketplace_ids,
                'interval' => $interval,
                'granularity' => $granularity,
                'granularityTimeZone' => $granularity_time_zone,
                'buyerType' => $buyer_type,
                'fulfillmentNetwork' => $fulfillment_network,
                'firstDayOfWeek' => $first_day_of_week,
                'asin' => $asin,
                'sku' => $sku,
                'amazonProgram' => $amazon_program,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
