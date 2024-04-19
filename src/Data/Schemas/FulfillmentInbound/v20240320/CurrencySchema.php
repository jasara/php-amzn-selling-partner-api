<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Brick\Money\Money;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CurrencySchema extends BaseSchema
{
    public function __construct(
        public string $amount,
        public string $code,
    ) {
    }

    public function asMoney(): Money
    {
        return Money::of($this->amount, $this->code);
    }
}
