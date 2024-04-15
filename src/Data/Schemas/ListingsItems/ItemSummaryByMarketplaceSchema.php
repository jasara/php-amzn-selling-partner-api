<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\CatalogItems\ItemImageSchema;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSummaryByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public string $asin;

    public string $product_type;

    #[StringEnumValidator(AmazonEnums::CONDITION_TYPE)]
    public ?string $condition_type;

    public array $status;

    public ?string $fnsku;

    public string $item_name;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $created_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $last_updated_date;

    public ?ItemImageSchema $main_image;
}
