<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20201201;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSummaryByMarketplaceSchema>
 */
class ItemSummaryByMarketplaceListSchema extends TypedCollection
{
    public const ITEM_CLASS = ItemSummaryByMarketplaceSchema::class;
}
