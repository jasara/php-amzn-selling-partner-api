<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemRelationshipsByMarketplaceSchema>
 */
class ItemRelationshipsByMarketplaceListSchema extends TypedCollection
{
    protected string $item_class = ItemRelationshipsByMarketplaceSchema::class;
}
