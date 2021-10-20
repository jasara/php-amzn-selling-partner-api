<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LengthSchema extends DataTransferObject
{
    public ?int $value;

    #[StringEnumValidator(['inches', 'centimeters'])]
    public ?string $unit;
}
