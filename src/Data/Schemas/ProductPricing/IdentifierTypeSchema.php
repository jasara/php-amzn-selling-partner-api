<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class IdentifierTypeSchema extends BaseSchema
{
    public function __construct(
        public AsinIdentifierSchema $marketplace_asin,
        public ?SellerSkuIdentifierSchema $sku_identifier,
    ) {
    }
}
