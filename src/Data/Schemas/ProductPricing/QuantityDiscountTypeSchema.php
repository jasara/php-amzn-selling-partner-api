<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class QuantityDiscountTypeSchema extends DataTransferObject
{
    #[StringEnumValidator(['QUANTITY_DISCOUNT'])]
    public string $quantity_discount;
}
