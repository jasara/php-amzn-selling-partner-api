<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class GetFeaturedOfferExpectedPriceBatchResponse extends BaseResponse
{
    public function __construct(
        public FeaturedOfferExpectedPriceResponseList $responses,
    ) {
    }
}