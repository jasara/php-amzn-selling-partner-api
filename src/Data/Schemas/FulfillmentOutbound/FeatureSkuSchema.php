<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeatureSkuSchema extends BaseSchema
{
    public function __construct(
        public ?string $seller_sku,
        public ?string $fn_sku,
        public ?string $asin,
        public ?string $sku_count,
        public ?array $overlapping_skus,
    ) {
    }
}
