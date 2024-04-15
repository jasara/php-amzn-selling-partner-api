<?php

namespace Jasara\AmznSPA\Data\Schemas\FbaInventory;

use Illuminate\Support\Collection;

class ResearchingQuantityEntryListSchema extends Collection
{
    public function offsetGet($key): ResearchingQuantityEntrySchema
    {
        return parent::offsetGet($key);
    }
}
