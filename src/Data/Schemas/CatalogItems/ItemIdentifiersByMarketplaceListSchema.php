<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemIdentifiersByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemIdentifiersByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
