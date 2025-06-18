<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class MoneyType extends BaseSchema
{
    public function __construct(
        public string $currency_code,
        public float $amount,
    ) {
    }
}