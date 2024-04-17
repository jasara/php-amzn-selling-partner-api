<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CompetitivePriceTypeSchema extends BaseSchema
{
    public function __construct(
        public string $competitive_price_id,
        public PriceTypeSchema $price,
        public ?string $condition,
        public ?string $subcondition,
        #[StringEnumValidator(['B2C', 'B2B'])]
        public ?string $offer_customer_type,
        public ?int $quantity_tier,
        public ?QuantityDiscountTypeSchema $quantity_discount_type,
        public ?string $seller_id,
        public ?bool $belongs_to_requester,
    ) {
    }
}
