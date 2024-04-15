<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemDisplayGroupSalesRankListSchema extends Collection
{
    public function offsetGet($key): ItemDisplayGroupSalesRankSchema
    {
        return parent::offsetGet($key);
    }
}
