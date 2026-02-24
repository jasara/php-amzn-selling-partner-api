<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Orders\v20260101\GetOrderResponse;
use Jasara\AmznSPA\Data\Responses\Orders\v20260101\SearchOrdersResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class Orders20260101Resource implements ResourceContract
{
    use ValidatesParameters;

    public const BASE_PATH = '/orders/2026-01-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    public function searchOrders(
        ?CarbonImmutable $created_after = null,
        ?CarbonImmutable $created_before = null,
        ?CarbonImmutable $last_updated_after = null,
        ?CarbonImmutable $last_updated_before = null,
        ?array $fulfillment_statuses = null,
        ?array $marketplace_ids = null,
        ?array $fulfilled_by = null,
        ?int $max_results_per_page = null,
        ?string $pagination_token = null,
        ?array $included_data = null,
    ): SearchOrdersResponse|ErrorListResponse {
        if ($this->requiresRestrictedDataToken($included_data)) {
            $this->http->setRestrictedDataElements(['buyerInfo', 'shippingAddress']);
        }

        $response = $this->http
            ->responseClass(SearchOrdersResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'orders', array_filter([
                'createdAfter' => $created_after?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'createdBefore' => $created_before?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'lastUpdatedAfter' => $last_updated_after?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'lastUpdatedBefore' => $last_updated_before?->tz('UTC')->format('Y-m-d\TH:i:s\Z'),
                'fulfillmentStatuses' => $fulfillment_statuses,
                'marketplaceIds' => $marketplace_ids,
                'fulfilledBy' => $fulfilled_by,
                'maxResultsPerPage' => $max_results_per_page,
                'paginationToken' => $pagination_token,
                'includedData' => $included_data,
            ]));

        return $response;
    }

    public function getOrder(
        string $order_id,
        ?array $included_data = null,
    ): GetOrderResponse|ErrorListResponse {
        if ($this->requiresRestrictedDataToken($included_data)) {
            $this->http->setRestrictedDataElements(['buyerInfo', 'shippingAddress']);
        }

        $response = $this->http
            ->responseClass(GetOrderResponse::class)
            ->get($this->endpoint . self::BASE_PATH . 'orders/' . $order_id, array_filter([
                'includedData' => $included_data,
            ]));

        return $response;
    }

    private function requiresRestrictedDataToken(?array $included_data): bool
    {
        if ($included_data === null) {
            return true;
        }

        return in_array('BUYER', $included_data, true) || in_array('RECIPIENT', $included_data, true);
    }
}
