<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class LowestPriceTypeSchema extends DataTransferObject
{
    public string $condition;

    public string $fulfillment_channel;

    public ?OfferCustomerTypeSchema $offer_type;

    public ?int $quantity_tier;

    public ?QuantityDiscountTypeSchema $quantity_discount_type;

    public MoneyTypeSchema $landed_price;

    public MoneyTypeSchema $listing_price;

    public MoneyTypeSchema $shipping;

    public PointsSchema $points;
}
