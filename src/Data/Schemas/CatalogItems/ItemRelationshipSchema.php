<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemRelationshipSchema extends BaseSchema
{
    public function __construct(
        public ?array $child_asins,
        public ?array $parent_asins,
        public ?ItemVariationThemeSchema $variation_theme,
        public ItemRelationshipType $type,
    ) {
    }
}
