<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\MoneySchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class OfferSchema extends DataTransferObject
{
    public PriceTypeSchema $buying_price;

    public ?QuantityDiscountPriceTypeSchema $quantity_discount_prices;

    public string $fulfillment_channel;

    public string $item_condition;

    public ?string $item_subcondition;

    public MoneySchema $regular_price;

    public string $seller_sku;

    #[StringEnumValidator(['B2C', 'B2B'])]
    public ?string $offer_type;

    public ?MoneySchema $business_price;
}
