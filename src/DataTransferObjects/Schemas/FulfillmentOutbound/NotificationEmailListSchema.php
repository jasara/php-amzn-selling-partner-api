<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class NotificationEmailListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): string
    {
        return parent::offsetGet($key);
    }
}
