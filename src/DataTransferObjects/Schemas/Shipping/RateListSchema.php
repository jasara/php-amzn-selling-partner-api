<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class RateListSchema extends Collection
{
    public function offsetGet($key): RateSchema
    {
        return parent::offsetGet($key);
    }
}
