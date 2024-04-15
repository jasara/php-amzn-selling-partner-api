<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemClassificationSalesRankListSchema extends Collection
{
    public function offsetGet($key): ItemClassificationSalesRankSchema
    {
        return parent::offsetGet($key);
    }
}
