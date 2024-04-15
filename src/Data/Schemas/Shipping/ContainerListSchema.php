<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerListSchema extends Collection
{
    public function offsetGet($key): ContainerSchema
    {
        return parent::offsetGet($key);
    }
}
