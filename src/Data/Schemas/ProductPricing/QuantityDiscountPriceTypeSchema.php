<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class QuantityDiscountPriceTypeSchema extends BaseSchema
{
    public function __construct(
        public ?int $quantity_tier,
        #[StringEnumValidator(['QUANTITY_DISCOUNT'])]
        public ?string $quantity_discount_type,
        public MoneySchema $listing_price,
    ) {
    }
}
