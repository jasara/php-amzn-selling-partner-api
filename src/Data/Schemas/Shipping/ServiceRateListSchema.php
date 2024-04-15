<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Illuminate\Support\Collection;

class ServiceRateListSchema extends Collection
{
    public function offsetGet($key): ServiceRateSchema
    {
        return parent::offsetGet($key);
    }
}
