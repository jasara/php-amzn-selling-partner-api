<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class TaxClassificationSchema extends DataTransferObject
{
    public ?string $name;

    public ?string $value;
}
