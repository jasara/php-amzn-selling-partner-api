<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Jasara\AmznSPA\Data\Base\TypedCollection;

/**
 * @template-extends TypedCollection<ItemProductTypeByMarketplaceSchema>
 */
class ItemProductTypeByMarketplaceListSchema extends TypedCollection
{
    protected string $item_class = ItemProductTypeByMarketplaceSchema::class;
}
