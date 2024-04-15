<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Illuminate\Support\Collection;

class EventListSchema extends Collection
{
    public function offsetGet($key): EventSchema
    {
        return parent::offsetGet($key);
    }
}
