<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentShipmentListSchema extends Collection
{
    public function offsetGet($key): FulfillmentShipmentSchema
    {
        return parent::offsetGet($key);
    }
}
