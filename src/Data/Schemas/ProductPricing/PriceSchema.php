<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PriceSchema extends BaseSchema
{
    public function __construct(
        public string $status,
        public ?string $seller_sku,
        public ?string $asin,
        public ?ProductSchema $product,
    ) {
    }
}
