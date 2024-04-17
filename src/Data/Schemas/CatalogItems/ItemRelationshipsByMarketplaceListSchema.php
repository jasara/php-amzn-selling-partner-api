<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemRelationshipsByMarketplaceSchema>
 */
class ItemRelationshipsByMarketplaceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemRelationshipsByMarketplaceSchema::class;
}
