<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing;

use Spatie\DataTransferObject\DataTransferObject;

class BuyBoxPriceTypeSchema extends DataTransferObject
{
    public string $condition;

    public ?OfferCustomerTypeSchema $offer_type;

    public ?INT $quantity_tier;

    public ?QuantityDiscountTypeSchema $quantity_discount_type;

    public MoneyTypeSchema $landed_price;

    public MoneyTypeSchema $listing_price;

    public MoneyTypeSchema $shipping;

    public PointsSchema $points;

    public ?string $seller_id;
}
