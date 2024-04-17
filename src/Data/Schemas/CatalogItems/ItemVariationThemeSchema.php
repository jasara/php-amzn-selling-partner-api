<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemVariationThemeSchema extends BaseSchema
{
    public function __construct(
        public ?array $attributes,
        public ?string $theme,
    ) {
    }
}
