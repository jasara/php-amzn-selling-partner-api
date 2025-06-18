<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class Price extends BaseSchema
{
    public function __construct(
        public MoneyType $listing_price,
        public ?MoneyType $shipping = null,
        public ?Points $points = null,
    ) {
    }
}