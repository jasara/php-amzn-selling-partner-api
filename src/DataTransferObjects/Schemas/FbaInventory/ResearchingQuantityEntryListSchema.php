<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Illuminate\Support\Collection;

class ResearchingQuantityEntryListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ResearchingQuantityEntrySchema
    {
        return parent::offsetGet($key);
    }
}
