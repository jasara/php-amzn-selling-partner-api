<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemVendorDetailsCategorySchema;

class ItemVendorDetailsByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?string $brand_code,
        public ?string $manufacturer_code,
        public ?string $manufacturer_code_parent,
        public ?ItemVendorDetailsCategorySchema $product_category,
        public ?string $product_group,
        public ?ItemVendorDetailsCategorySchema $product_subcategory,
        #[StringEnumValidator(AmazonEnums::REPLENISHMENT_CATEGORIES)]
        public ?string $replenishment_category,
    ) {
    }
}
