<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentShipmentItemListSchema extends Collection
{
    public function offsetGet($key): FulfillmentShipmentItemSchema
    {
        return parent::offsetGet($key);
    }
}
