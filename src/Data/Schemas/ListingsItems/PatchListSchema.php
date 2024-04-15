<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class PatchListSchema extends Collection
{
    public function offsetGet($key): PatchOperationSchema
    {
        return parent::offsetGet($key);
    }
}
