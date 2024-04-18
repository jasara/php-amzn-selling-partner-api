<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellerSkuIdentifierSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $seller_id,
        public string $seller_sku,
    ) {
    }
}
