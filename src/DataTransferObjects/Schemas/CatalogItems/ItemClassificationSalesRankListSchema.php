<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemClassificationSalesRankListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ItemClassificationSalesRankSchema
    {
        return parent::offsetGet($key);
    }
}
