<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Illuminate\Support\Collection;

class ItemVendorDetailsByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemVendorDetailsByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
