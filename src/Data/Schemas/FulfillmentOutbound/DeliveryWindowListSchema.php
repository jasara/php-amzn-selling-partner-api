<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class DeliveryWindowListSchema extends Collection
{
    public function offsetGet($key): DeliveryWindowSchema
    {
        return parent::offsetGet($key);
    }
}
