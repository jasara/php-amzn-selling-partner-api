<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Brick\Money\Money;
use Jasara\AmznSPA\Data\Base\Validators\StringIsNumberValidator;

class AmountSchema extends BaseSchema
{
    public function __construct(
        public string $currency_code,
        #[StringIsNumberValidator]
        public string $value,
    ) {
    }

    public function asMoney(): Money
    {
        return Money::of($this->value, $this->currency_code);
    }
}
