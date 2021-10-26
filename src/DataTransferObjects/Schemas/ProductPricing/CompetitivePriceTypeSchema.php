<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class CompetitivePriceTypeSchema extends DataTransferObject
{
    public string $competitive_price_id;

    public PriceTypeSchema $price;

    public ?string $condition;

    public ?string $subcondition;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public ?string $offer_customer_type;

    public ?int $quantity_tier;

    public ?QuantityDiscountTypeSchema $quantity_discount_type;

    public ?string $seller_id;

    public ?bool $belongs_to_requester;
}
