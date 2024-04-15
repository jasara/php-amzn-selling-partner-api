<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Illuminate\Support\Collection;

class ServiceTypeListSchema extends Collection
{
    public function offsetGet($key): ServiceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
