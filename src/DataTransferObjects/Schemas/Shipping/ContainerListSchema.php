<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerListSchema extends Collection
{
    public function offsetGet($key): ContainerSchema
    {
        return parent::offsetGet($key);
    }
}
