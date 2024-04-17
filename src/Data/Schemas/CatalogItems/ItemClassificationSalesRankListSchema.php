<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemClassificationSalesRankSchema>
 */
class ItemClassificationSalesRankListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemClassificationSalesRankSchema::class;
}
