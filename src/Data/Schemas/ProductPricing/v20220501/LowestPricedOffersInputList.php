<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LowestPricedOffersInputList extends BaseSchema
{
    public function __construct(
        public array $lowest_priced_offers_inputs,
    ) {
    }
}