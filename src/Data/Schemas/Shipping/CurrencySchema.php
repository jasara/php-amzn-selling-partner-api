<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Validators\MaxLengthValidator;
use Spatie\DataTransferObject\DataTransferObject;

class CurrencySchema extends DataTransferObject
{
    public float $value;

    #[MaxLengthValidator(3)]
    public string $unit;
}
