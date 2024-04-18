<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSalesRankSchema>
 */
class ItemSalesRankListSchema extends TypedCollection
{
    public const ITEM_CLASS = ItemSalesRankSchema::class;
}
