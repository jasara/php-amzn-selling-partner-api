<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemVariationsByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemVariationsByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
