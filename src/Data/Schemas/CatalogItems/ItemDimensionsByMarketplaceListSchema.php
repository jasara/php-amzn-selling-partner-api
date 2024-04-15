<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemDimensionsByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemDimensionsByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
