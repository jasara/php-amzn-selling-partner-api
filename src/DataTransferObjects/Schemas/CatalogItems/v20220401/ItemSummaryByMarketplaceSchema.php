<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\DataTransferObjects\Casts\BackedEnumCaster;
use Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;
use Jasara\AmznSPA\Enums\CatalogItems\ItemClassification;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ItemSummaryByMarketplaceSchema extends DataTransferObject
{
    public string $marketplace_id;

    public ?bool $adult_product;

    public ?bool $autographed;

    public ?string $brand;

    public ?CatalogItems\ItemBrowseClassificationSchema $browse_classification;

    public ?string $color;

    public ?string $item_name;

    #[CastWith(BackedEnumCaster::class)]
    public ?ItemClassification $item_classification;

    public ?string $manufacturer;

    public ?bool $memorabilia;

    public ?string $model_number;

    public ?int $package_quantity;

    public ?string $part_number;

    public ?string $size;

    public ?string $style;

    public ?bool $trade_in_eligible;

    public ?string $website_display_group;

    public ?string $website_display_group_name;
}
