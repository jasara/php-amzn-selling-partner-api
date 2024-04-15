<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20220401;

use Illuminate\Support\Collection;

class ItemSummaryByMarketplaceListSchema extends Collection
{
    public function offsetGet($key): ItemSummaryByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
