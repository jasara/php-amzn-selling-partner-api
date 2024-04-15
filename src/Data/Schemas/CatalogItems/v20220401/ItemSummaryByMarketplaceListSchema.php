<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems\v20220401;

use Illuminate\Support\Collection;

class ItemSummaryByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemSummaryByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
