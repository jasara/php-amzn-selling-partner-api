<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class PatchListSchema extends Collection
{
    public function offsetGet($key): PatchOperationSchema
    {
        return parent::offsetGet($key);
    }
}
