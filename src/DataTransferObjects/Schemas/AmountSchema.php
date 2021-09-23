<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Brick\Money\Money;
use Spatie\DataTransferObject\DataTransferObject;

class AmountSchema extends DataTransferObject
{
    public string $currency_code;

    public string $value;

    public function asMoney(): Money
    {
        return Money::of($this->value, $this->currency_code);
    }
}
