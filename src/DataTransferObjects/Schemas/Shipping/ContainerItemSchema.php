<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerItemSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ContainerItem
    {
        return parent::offsetGet($key);
    }
}
