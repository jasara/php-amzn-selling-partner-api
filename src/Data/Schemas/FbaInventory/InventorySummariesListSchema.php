<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Illuminate\Support\Collection;

class InventorySummariesListSchema extends Collection
{
    public function offsetGet($key): InventorySummarySchema
    {
        return parent::offsetGet($key);
    }
}
