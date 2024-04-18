<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class PriceTypeSchema extends BaseSchema
{
    public function __construct(
        public ?MoneySchema $landed_price,
        public ?MoneySchema $listing_price,
        public ?MoneySchema $shipping,
        public ?PointsSchema $points,
    ) {
    }
}
