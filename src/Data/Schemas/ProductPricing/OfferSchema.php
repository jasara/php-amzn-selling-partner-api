<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class OfferSchema extends BaseSchema
{
    public function __construct(
        public PriceTypeSchema $buying_price,
        public ?QuantityDiscountPriceTypeSchema $quantity_discount_prices,
        public string $fulfillment_channel,
        public string $item_condition,
        public ?string $item_subcondition,
        public MoneySchema $regular_price,
        public string $seller_sku,
        #[StringEnumValidator(['B2C', 'B2B'])]
        public ?string $offer_type,
        public ?MoneySchema $business_price,
    ) {
    }
}
