<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class MoneySchema extends DataTransferObject
{
    public ?string $currency_code;

    public ?int $amount;
}
