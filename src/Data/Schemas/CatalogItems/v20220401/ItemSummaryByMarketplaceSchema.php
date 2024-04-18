<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemClassification;

class ItemSummaryByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?string $brand,
        public ?CatalogItems\ItemBrowseClassificationSchema $browse_node,
        public ?string $color,
        public ?string $item_name,
        public ?ItemClassification $item_classification,
        public ?string $manufacturer,
        public ?string $model_number,
        public ?int $package_quantity,
        public ?string $part_number,
        public ?string $size,
        public ?string $style,
        public ?string $website_display_group,
    ) {
    }
}
