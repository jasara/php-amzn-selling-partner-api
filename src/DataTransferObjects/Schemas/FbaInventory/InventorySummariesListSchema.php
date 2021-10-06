<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Illuminate\Support\Collection;

class InventorySummariesListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): InventorySummarySchema
    {
        return parent::offsetGet($key);
    }
}
