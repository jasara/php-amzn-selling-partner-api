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

    public ?string $brand;

    public ?CatalogItems\ItemBrowseClassificationSchema $browse_node;

    public ?string $color;

    public ?string $item_name;

    #[CastWith(BackedEnumCaster::class)]
    public ?ItemClassification $item_classification;

    public ?string $manufacturer;

    public ?string $model_number;

    public ?int $package_quantity;

    public ?string $part_number;

    public ?string $size;

    public ?string $style;

    public ?string $website_display_group;
}
