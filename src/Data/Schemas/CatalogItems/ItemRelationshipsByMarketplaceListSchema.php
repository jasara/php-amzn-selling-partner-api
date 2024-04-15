<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemRelationshipsByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemRelationshipsByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
