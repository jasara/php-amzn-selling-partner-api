<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Illuminate\Support\Collection;

class DestinationListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): DestinationSchema
    {
        return parent::offsetGet($key);
    }
}
