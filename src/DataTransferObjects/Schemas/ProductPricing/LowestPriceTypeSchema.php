<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Schemas\MoneySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class LowestPriceTypeSchema extends DataTransferObject
{
    public string $condition;

    public string $fulfillment_channel;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public ?string $offer_customer_type;

    public ?int $quantity_tier;

    public ?QuantityDiscountTypeSchema $quantity_discount_type;

    public MoneySchema $landed_price;

    public MoneySchema $listing_price;

    public MoneySchema $shipping;

    public ?PointsSchema $points;
}
