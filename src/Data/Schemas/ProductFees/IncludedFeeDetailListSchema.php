<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Illuminate\Support\Collection;

class IncludedFeeDetailListSchema extends Collection
{
    public function offsetGet($key): IncludedFeeDetailSchema
    {
        return parent::offsetGet($key);
    }
}
