<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeaturedOfferExpectedPriceResult extends BaseSchema
{
    public function __construct(
        public string $result_status,
        public ?FeaturedOfferExpectedPrice $featured_offer_expected_price = null,
        public ?FeaturedOffer $competing_featured_offer = null,
        public ?FeaturedOffer $current_featured_offer = null,
    ) {
    }
}