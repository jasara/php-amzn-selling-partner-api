<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemRelationshipSchema>
 */
class ItemRelationshipListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemRelationshipSchema::class;
}
