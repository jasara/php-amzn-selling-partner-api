<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemImagesByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemImagesByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
