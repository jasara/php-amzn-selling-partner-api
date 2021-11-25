<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\ItemImageSchema;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringArrayEnumValidator;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSummaryByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public string $asin;

    public string $product_type;

    #[StringEnumValidator(AmazonEnums::CONDITION_TYPE)]
    public ?string $condition_type;

    // #[StringArrayEnumValidator()] it is array of string enum
    public array $status;

    public ?string $fn_sku;

    public string $item_name;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $created_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $last_updated_date;

    public ?ItemImageSchema $main_image;
}