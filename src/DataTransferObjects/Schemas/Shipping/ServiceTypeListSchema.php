<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class ServiceTypeListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ServiceTypeSchema
    {
        return parent::offsetGet($key);
    }
}
