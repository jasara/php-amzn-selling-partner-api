<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Illuminate\Support\Collection;

class DestinationListSchema extends Collection
{
    public function offsetGet($key): DestinationSchema
    {
        return parent::offsetGet($key);
    }
}
