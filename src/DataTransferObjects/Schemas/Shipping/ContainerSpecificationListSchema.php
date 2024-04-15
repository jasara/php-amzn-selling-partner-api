<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerSpecificationListSchema extends Collection
{
    public function offsetGet($key): ContainerSpecificationSchema
    {
        return parent::offsetGet($key);
    }
}
