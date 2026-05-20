<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventGroupsResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventsByGroupIdResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventsByOrderIdResponse;
use Jasara\AmznSPA\Data\Responses\FinancesV0\ListFinancialEventsResponse;

class FinancesV0Resource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function listFinancialEventGroups(
        ?int $max_results_per_page = null,
        ?string $financial_event_group_started_before = null,
        ?string $financial_event_group_started_after = null,
        ?string $next_token = null
    ): ListFinancialEventGroupsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ListFinancialEventGroupsResponse::class)
            ->get($this->endpoint . '/finances/v0/financialEventGroups', $this->filterQuery([
                'MaxResultsPerPage' => $max_results_per_page,
                'FinancialEventGroupStartedBefore' => $financial_event_group_started_before,
                'FinancialEventGroupStartedAfter' => $financial_event_group_started_after,
                'NextToken' => $next_token,
            ]));

        return $response;
    }

    public function listFinancialEventsByGroupId(
        string $event_group_id,
        ?int $max_results_per_page = null,
        ?string $posted_after = null,
        ?string $posted_before = null,
        ?string $next_token = null
    ): ListFinancialEventsByGroupIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ListFinancialEventsByGroupIdResponse::class)
            ->get($this->endpoint . '/finances/v0/financialEventGroups/' . rawurlencode((string) $event_group_id) . '/financialEvents', $this->filterQuery([
                'MaxResultsPerPage' => $max_results_per_page,
                'PostedAfter' => $posted_after,
                'PostedBefore' => $posted_before,
                'NextToken' => $next_token,
            ]));

        return $response;
    }

    public function listFinancialEventsByOrderId(
        string $order_id,
        ?int $max_results_per_page = null,
        ?string $next_token = null
    ): ListFinancialEventsByOrderIdResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ListFinancialEventsByOrderIdResponse::class)
            ->get($this->endpoint . '/finances/v0/orders/' . rawurlencode((string) $order_id) . '/financialEvents', $this->filterQuery([
                'MaxResultsPerPage' => $max_results_per_page,
                'NextToken' => $next_token,
            ]));

        return $response;
    }

    public function listFinancialEvents(
        ?int $max_results_per_page = null,
        ?string $posted_after = null,
        ?string $posted_before = null,
        ?string $next_token = null
    ): ListFinancialEventsResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(ListFinancialEventsResponse::class)
            ->get($this->endpoint . '/finances/v0/financialEvents', $this->filterQuery([
                'MaxResultsPerPage' => $max_results_per_page,
                'PostedAfter' => $posted_after,
                'PostedBefore' => $posted_before,
                'NextToken' => $next_token,
            ]));

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }
}
