<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class ContainerSpecificationListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ContainerSpecificationSchema
    {
        return parent::offsetGet($key);
    }
}
