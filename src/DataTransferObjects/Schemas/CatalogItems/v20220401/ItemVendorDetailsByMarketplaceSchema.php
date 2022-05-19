<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemVendorDetailsCategorySchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemVendorDetailsByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?string $brand_code;

    public ?string $manufacturer_code;

    public ?string $manufacturer_code_parent;

    public ?ItemVendorDetailsCategorySchema $product_category;

    public ?string $product_group;

    public ?ItemVendorDetailsCategorySchema $product_subcategory;

    #[StringEnumValidator(AmazonEnums::REPLENISHMENT_CATEGORIES)]
    public ?string $replenishment_category;
}
