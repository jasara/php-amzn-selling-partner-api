<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemImagesByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemImagesByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
