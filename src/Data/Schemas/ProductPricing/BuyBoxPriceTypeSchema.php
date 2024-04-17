<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class BuyBoxPriceTypeSchema extends BaseSchema
{
    public function __construct(
        public string $condition,
        #[StringEnumValidator(['B2C', 'B2B'])]
        public ?string $offer_customer_type,
        public ?int $quantity_tier,
        public ?QuantityDiscountTypeSchema $quantity_discount_type,
        public MoneySchema $landed_price,
        public MoneySchema $listing_price,
        public MoneySchema $shipping,
        public PointsSchema $points,
        public ?string $seller_id,
    ) {
    }
}
