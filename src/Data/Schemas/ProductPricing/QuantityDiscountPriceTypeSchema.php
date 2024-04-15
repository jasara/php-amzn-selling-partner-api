<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class QuantityDiscountPriceTypeSchema extends DataTransferObject
{
    public ?int $quantity_tier;

    #[StringEnumValidator(['QUANTITY_DISCOUNT'])]
    public ?string $quantity_discount_type;

    public MoneySchema $listing_price;
}
