<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemSummaryByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?string $brand_name,
        public ?string $browse_node,
        public ?string $color_name,
        public ?string $item_name,
        public ?string $manufacturer,
        public ?string $model_number,
        public ?string $size_name,
        public ?string $style_name,
    ) {
    }
}
