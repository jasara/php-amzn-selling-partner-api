<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Brick\Money\Money;
use Spatie\DataTransferObject\DataTransferObject;

class MoneySchema extends DataTransferObject
{
    public ?string $currency_code;

    public ?string $amount;

    public function asMoney(): Money
    {
        return Money::of($this->amount, $this->currency_code);
    }
}
