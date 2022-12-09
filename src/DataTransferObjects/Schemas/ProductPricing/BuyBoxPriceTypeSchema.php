<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class BuyBoxPriceTypeSchema extends DataTransferObject
{
    public string $condition;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public ?string $offer_type;

    public ?int $quantity_tier;

    public ?QuantityDiscountTypeSchema $quantity_discount_type;

    public MoneySchema $landed_price;

    public MoneySchema $listing_price;

    public MoneySchema $shipping;

    public ?PointsSchema $points;

    public ?string $seller_id;
}
