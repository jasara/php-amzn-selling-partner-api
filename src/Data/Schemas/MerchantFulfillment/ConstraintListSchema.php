<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class ConstraintListSchema extends Collection
{
    public function offsetGet($key): ConstraintSchema
    {
        return parent::offsetGet($key);
    }
}
