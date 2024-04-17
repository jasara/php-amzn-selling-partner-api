<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\PointsSchema;

class PriceToEstimateFeesSchema extends BaseSchema
{
    public function __construct(
        public MoneySchema $listing_price,
        public ?MoneySchema $shipping,
        public ?PointsSchema $points,
    ) {
    }
}
