<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemSalesRankListSchema extends Collection
{
    public function offsetGet($key): ItemSalesRankSchema
    {
        return parent::offsetGet($key);
    }
}
