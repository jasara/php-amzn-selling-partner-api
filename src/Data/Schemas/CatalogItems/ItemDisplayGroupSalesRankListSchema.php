<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemDisplayGroupSalesRankSchema>
 */
class ItemDisplayGroupSalesRankListSchema extends TypedCollection
{
    protected string $item_class = ItemDisplayGroupSalesRankSchema::class;
}
