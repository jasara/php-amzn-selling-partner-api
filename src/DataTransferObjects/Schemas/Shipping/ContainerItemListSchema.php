<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerItemListSchema extends Collection
{
    public function offsetGet($key): ContainerItemSchema
    {
        return parent::offsetGet($key);
    }
}
