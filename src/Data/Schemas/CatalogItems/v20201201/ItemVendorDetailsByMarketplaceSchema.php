<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemVendorDetailsByMarketplaceSchema extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public ?string $brand_code,
        public ?string $category_code,
        public ?string $manufacturer_code,
        public ?string $manufacturer_code_parent,
        public ?string $product_group,
        #[StringEnumValidator(AmazonEnums::REPLENISHMENT_CATEGORIES)]
        public ?string $replenishment_category,
        public ?string $subcategory_code,
    ) {
    }
}
