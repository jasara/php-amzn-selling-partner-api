<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class PointsSchema extends BaseSchema
{
    public function __construct(
        public ?int $points_number,
        public ?MoneySchema $points_monetary_value,
    ) {
    }
}
