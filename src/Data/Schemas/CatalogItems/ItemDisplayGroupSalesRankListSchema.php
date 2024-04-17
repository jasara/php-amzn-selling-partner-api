<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemDisplayGroupSalesRankSchema>
 */
class ItemDisplayGroupSalesRankListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemDisplayGroupSalesRankSchema::class;
}
