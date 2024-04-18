<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSummaryByMarketplaceSchema>
 */
class ItemSummaryListSchema extends TypedCollection
{
    public const ITEM_CLASS = ItemSummaryByMarketplaceSchema::class;
}
