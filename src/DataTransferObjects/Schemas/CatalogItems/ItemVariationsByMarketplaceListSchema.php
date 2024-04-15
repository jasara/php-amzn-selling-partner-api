<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemVariationsByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemVariationsByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
