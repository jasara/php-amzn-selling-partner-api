<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemClassificationSalesRankSchema>
 */
class ItemClassificationSalesRankListSchema extends TypedCollection
{
    protected string $item_class = ItemClassificationSalesRankSchema::class;
}
