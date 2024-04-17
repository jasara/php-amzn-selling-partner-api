<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemSalesRanksByMarketplaceSchema>
 */
class ItemSalesRanksByMarketplaceListSchema extends TypedCollection
{
    public const string ITEM_CLASS = ItemSalesRanksByMarketplaceSchema::class;
}
