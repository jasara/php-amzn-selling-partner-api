<?php

namespace Jasara\AmznSPA\Resources;

use Jasara\AmznSPA\AmznSPAHttp;
use Jasara\AmznSPA\Contracts\ResourceContract;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\CompetitiveSummaryBatchRequest;
use Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501\GetFeaturedOfferExpectedPriceBatchRequest;
use Jasara\AmznSPA\Data\Responses\ErrorListResponse;
use Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501\CompetitiveSummaryBatchResponse;
use Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501\GetFeaturedOfferExpectedPriceBatchResponse;
use Jasara\AmznSPA\Traits\ValidatesParameters;

class ProductPricing20220501Resource implements ResourceContract
{
    use ValidatesParameters;
    public const BASE_PATH = '/batches/products/pricing/2022-05-01/';

    public function __construct(
        private AmznSPAHttp $http,
        private string $endpoint,
    ) {
    }

    /**
     * Returns the set of responses that correspond to the batched list of up to 40 requests defined in the request body.
     * The response for each successful (HTTP status code 200) request in the set includes the computed listing price
     * at or below which a seller can expect to become the featured offer (before applicable promotions).
     * This is called the featured offer expected price (FOEP).
     *
     * @param GetFeaturedOfferExpectedPriceBatchRequest $request
     * @return GetFeaturedOfferExpectedPriceBatchResponse|ErrorListResponse
     */
    public function getFeaturedOfferExpectedPriceBatch(
        GetFeaturedOfferExpectedPriceBatchRequest $request
    ): GetFeaturedOfferExpectedPriceBatchResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(GetFeaturedOfferExpectedPriceBatchResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'offer/featuredOfferExpectedPrice',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }

    /**
     * Returns the competitive summary response, including featured buying options for the ASIN and marketplaceId combination.
     *
     * @param CompetitiveSummaryBatchRequest $request
     * @return CompetitiveSummaryBatchResponse|ErrorListResponse
     */
    public function getCompetitiveSummary(
        CompetitiveSummaryBatchRequest $request
    ): CompetitiveSummaryBatchResponse|ErrorListResponse {
        $response = $this->http
            ->responseClass(CompetitiveSummaryBatchResponse::class)
            ->post(
                $this->endpoint . self::BASE_PATH . 'items/competitiveSummary',
                deep_array_conversion($request->toArrayObject()),
            );

        return $response;
    }
}
