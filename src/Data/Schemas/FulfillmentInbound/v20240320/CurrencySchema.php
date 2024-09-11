<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Brick\Money\Money;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CurrencySchema extends BaseSchema
{
    public function __construct(
        public float $amount,
        public string $code,
    ) {
        if (strlen($this->code) !== 3) {
            throw new \InvalidArgumentException('Currency code must be exactly 3 characters long.');
        }
    }

    public function asMoney(): Money
    {
        return Money::of($this->amount, $this->code);
    }
}
