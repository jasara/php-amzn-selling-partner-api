<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class CurrencySchema extends DataTransferObject
{
    public float $value;

    #[MaxLengthValidator(3)]
    public string $unit;
}
