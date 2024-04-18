<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InventorySummarySchema extends BaseSchema
{
    public function __construct(
        public ?string $asin,
        public ?string $fnsku,
        public ?string $seller_sku,
        public ?string $condition,
        public ?InventoryDetailsSchema $inventory_details,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $last_updated_time,
        public ?string $product_name,
        public ?int $total_quantity,
    ) {
    }
}
