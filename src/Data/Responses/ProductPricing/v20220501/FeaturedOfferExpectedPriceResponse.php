<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\FeaturedOfferExpectedPriceRequestParams;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\FeaturedOfferExpectedPriceResponseBody;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\HttpHeaders;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\HttpStatusLine;

class FeaturedOfferExpectedPriceResponse extends BaseResponse
{
    public function __construct(
        public FeaturedOfferExpectedPriceRequestParams $request,
        public HttpStatusLine $status,
        public HttpHeaders $headers,
        public ?FeaturedOfferExpectedPriceResponseBody $body = null,
    ) {
    }
}