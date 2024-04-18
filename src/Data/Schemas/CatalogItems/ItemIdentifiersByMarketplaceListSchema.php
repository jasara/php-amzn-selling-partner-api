<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemIdentifiersByMarketplaceSchema>
 */
class ItemIdentifiersByMarketplaceListSchema extends TypedCollection
{
    public const ITEM_CLASS = ItemIdentifiersByMarketplaceSchema::class;
}
