<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelSpecificationSchema extends DataTransferObject
{
    #[StringEnumValidator(['PNG'])]
    public string $label_format;

    #[StringEnumValidator(['4x6'])]
    public string $label_stock_size;
}
