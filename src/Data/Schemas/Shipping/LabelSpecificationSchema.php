<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LabelSpecificationSchema extends DataTransferObject
{
    #[StringEnumValidator(['PNG'])]
    public string $label_format;

    #[StringEnumValidator(['4x6'])]
    public string $label_stock_size;
}
