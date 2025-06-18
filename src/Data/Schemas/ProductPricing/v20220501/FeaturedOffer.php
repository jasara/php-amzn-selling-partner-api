<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeaturedOffer extends BaseSchema
{
    public function __construct(
        public OfferIdentifier $offer_identifier,
        public ?Condition $condition = null,
        public ?Price $price = null,
    ) {
    }
}