<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSummaryByMarketplaceSchema>
 */
class ItemSummaryByMarketplaceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemSummaryByMarketplaceSchema::class;
}
