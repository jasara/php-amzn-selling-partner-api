<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FbaInventory;

use Illuminate\Support\Collection;

class ResearchingQuantityEntryListSchema extends Collection
{
    public function offsetGet($key): ResearchingQuantityEntrySchema
    {
        return parent::offsetGet($key);
    }
}
