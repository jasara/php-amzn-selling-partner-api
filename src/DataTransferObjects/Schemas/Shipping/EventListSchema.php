<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class EventListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): EventSchema
    {
        return parent::offsetGet($key);
    }
}
