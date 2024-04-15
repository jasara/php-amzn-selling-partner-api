<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerItemListSchema extends Collection
{
    public function offsetGet($key): ContainerItemSchema
    {
        return parent::offsetGet($key);
    }
}
