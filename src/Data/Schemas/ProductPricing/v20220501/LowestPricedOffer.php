<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LowestPricedOffer extends BaseSchema
{
    public function __construct(
        public ?LowestPricedOffersInput $lowest_priced_offers_input = null,
        public ?OfferList $offers = null,
    ) {
    }
}