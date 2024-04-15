<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemProductTypeByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemProductTypeByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
