<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemImageSchema>
 */
class ItemImageListSchema extends TypedCollection
{
    public const ITEM_CLASS = ItemImageSchema::class;
}
