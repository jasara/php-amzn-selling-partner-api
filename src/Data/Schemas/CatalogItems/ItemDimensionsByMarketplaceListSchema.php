<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemDimensionsByMarketplaceSchema>
 */
class ItemDimensionsByMarketplaceListSchema extends TypedCollection
{
    public const ITEM_CLASS = ItemDimensionsByMarketplaceSchema::class;
}
