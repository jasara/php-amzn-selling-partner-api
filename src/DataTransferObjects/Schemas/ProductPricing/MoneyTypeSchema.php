<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class MoneyTypeSchema extends DataTransferObject
{
    public ?string $currency_code;

    public ?int $amount;
}
