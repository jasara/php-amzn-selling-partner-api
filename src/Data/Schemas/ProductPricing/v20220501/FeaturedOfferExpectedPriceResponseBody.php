<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\ErrorListSchema;

class FeaturedOfferExpectedPriceResponseBody extends BaseSchema
{
    public function __construct(
        public ?OfferIdentifier $offer_identifier = null,
        public ?FeaturedOfferExpectedPriceResultList $featured_offer_expected_price_results = null,
        public ?ErrorListSchema $errors = null,
    ) {
    }
}