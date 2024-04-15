<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Illuminate\Support\Collection;

class RateListSchema extends Collection
{
    public function offsetGet($key): RateSchema
    {
        return parent::offsetGet($key);
    }
}
