<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Illuminate\Support\Collection;

class FeeDetailListSchema extends Collection
{
    public function offsetGet($key): FeeDetailSchema
    {
        return parent::offsetGet($key);
    }
}
