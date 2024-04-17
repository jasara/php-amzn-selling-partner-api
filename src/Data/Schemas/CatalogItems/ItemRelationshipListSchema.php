<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemRelationshipSchema>
 */
class ItemRelationshipListSchema extends TypedCollection
{
    protected string $item_class = ItemRelationshipSchema::class;
}
