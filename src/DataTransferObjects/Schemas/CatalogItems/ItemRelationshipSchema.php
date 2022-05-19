<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Jasara\AmznSPA\DataTransferObjects\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Enums\CatalogItems\ItemRelationshipType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ItemRelationshipSchema extends DataTransferObject
{
    public ?array $child_asins;

    public ?array $parent_asins;

    public ?ItemVariationThemeSchema $variation_theme;

    #[CastWith(BackedEnumCaster::class)]
    public ItemRelationshipType $type;
}
