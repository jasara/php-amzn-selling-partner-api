<?php

namespace Jasara\AmznSPA\Data\Schemas;

use Brick\Money\Money;

class MoneySchema extends BaseSchema
{
    public function __construct(
        public ?string $currency_code,
        public ?string $amount,
    ) {
    }

    public function asMoney(): Money
    {
        return Money::of($this->amount, $this->currency_code);
    }
}
