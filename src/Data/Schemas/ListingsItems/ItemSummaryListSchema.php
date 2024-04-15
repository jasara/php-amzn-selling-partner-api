<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class ItemSummaryListSchema extends Collection
{
    public function offsetGet($key): ItemSummaryByMarketplaceSchema
    {
        return parent::offsetGet($key);
    }
}
