<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ItemVendorDetailsByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?string $brand_code;

    public ?string $category_code;

    public ?string $manufacturer_code;

    public ?string $manufacturer_code_parent;

    public ?string $product_group;

    #[StringEnumValidator(AmazonEnums::REPLENISHMENT_CATEGORIES)]
    public ?string $replenishment_category;

    public ?string $subcategory_code;
}
