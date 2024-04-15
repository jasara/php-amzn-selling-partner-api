<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Spatie\DataTransferObject\DataTransferObject;

class ItemVariationThemeSchema extends DataTransferObject
{
    public ?array $attributes;

    public ?string $theme;
}
