<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemIdentifierSchema>
 */
class ItemIdentifierListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemIdentifierSchema::class;
}
