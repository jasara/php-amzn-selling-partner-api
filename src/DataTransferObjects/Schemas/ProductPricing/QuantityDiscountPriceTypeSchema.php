<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

// use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class QuantityDiscountPriceTypeSchema extends DataTransferObject
{
    public ?int $quantity_tier;

    #[StringEnumValidator(['QUANTITY_DISCOUNT'])]
    public ?string $quantity_discount_type;

    public MoneyTypeSchema $listing_price;
}
