<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\WeightSchema;

class ContainerItemSchema extends BaseSchema
{
    public function __construct(
        public int $quantity,
        public CurrencySchema $unit_price,
        public WeightSchema $unit_weight,
        public string $title,
    ) {
    }
}
