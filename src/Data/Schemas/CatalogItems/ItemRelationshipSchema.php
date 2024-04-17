<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class ItemRelationshipSchema extends BaseSchema
{
    public function __construct(
        public ?array $child_asins,
        public ?array $parent_asins,
        public ?ItemVariationThemeSchema $variation_theme,
        #[CastWith(BackedEnumCaster::class)]
        public ItemRelationshipType $type,
    ) {
    }
}
