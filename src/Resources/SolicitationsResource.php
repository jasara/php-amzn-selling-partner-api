<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\Solicitations\CreateProductReviewAndSellerFeedbackSolicitationResponse;
use Jasara\AmznSPA\Data\Responses\Solicitations\GetSolicitationActionsForOrderResponse;

class SolicitationsResource implements ResourceContract
{
    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {}

    public function getSolicitationActionsForOrder(
        string $amazon_order_id,
        array $marketplace_ids
    ): GetSolicitationActionsForOrderResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetSolicitationActionsForOrderResponse::class)
            ->get($this->endpoint . '/solicitations/v1/orders/' . rawurlencode((string) $amazon_order_id), $this->filterQuery([
                'marketplaceIds' => $marketplace_ids,
            ]));

        return $response;
    }

    public function createProductReviewAndSellerFeedbackSolicitation(
        string $amazon_order_id,
        array $marketplace_ids
    ): CreateProductReviewAndSellerFeedbackSolicitationResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CreateProductReviewAndSellerFeedbackSolicitationResponse::class)
            ->post(
                $this->endpoint . '/solicitations/v1/orders/' . rawurlencode((string) $amazon_order_id) . '/solicitations/productReviewAndSellerFeedback' . $this->buildQueryString([
                    'marketplaceIds' => $marketplace_ids,
                ]),
                [],
            );

        return $response;
    }

    private function filterQuery(array $query): array
    {
        return array_filter($query, fn ($value) => $value !== null);
    }

    private function buildQueryString(array $query): string
    {
        $query = $this->filterQuery($query);

        foreach ($query as $key => $value) {
            if (is_array($value) && array_values($value) === $value) {
                $query[$key] = implode(',', $value);
            }
        }

        return '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    }
}
