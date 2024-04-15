<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class TaxClassificationSchema extends DataTransferObject
{
    public ?string $name;

    public ?string $value;
}
