<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class DeliveryWindowListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): DeliveryWindowSchema
    {
        return parent::offsetGet($key);
    }
}
