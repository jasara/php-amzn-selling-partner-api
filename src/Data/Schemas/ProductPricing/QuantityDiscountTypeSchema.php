<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class QuantityDiscountTypeSchema extends BaseSchema
{
    public function __construct(
        #[StringEnumValidator(['QUANTITY_DISCOUNT'])]
        public string $quantity_discount,
    ) {
    }
}
