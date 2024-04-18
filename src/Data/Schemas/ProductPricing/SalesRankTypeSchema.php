<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SalesRankTypeSchema extends BaseSchema
{
    public function __construct(
        public string $product_category_id,
        public int $rank,
    ) {
    }
}
