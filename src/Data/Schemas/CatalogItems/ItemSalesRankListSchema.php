<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSalesRankSchema>
 */
class ItemSalesRankListSchema extends TypedCollection
{
    protected string $item_class = ItemSalesRankSchema::class;
}
