<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

use Spatie\DataTransferObject\DataTransferObject;

class QuantityDiscountTypeSchema extends DataTransferObject
{
    #[StringEnumValidator(['QUANTITY_DISCOUNT'])]
    public string $quantity_discount;
}
