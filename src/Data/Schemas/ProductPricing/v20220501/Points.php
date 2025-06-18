<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class Points extends BaseSchema
{
    public function __construct(
        public int $points_number,
        public ?MoneyType $points_monetary_value = null,
    ) {
    }
}