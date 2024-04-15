<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Illuminate\Support\Collection;

class UpdateShipmentStatusOrderItemListSchema extends Collection
{
    public function offsetGet($key): UpdateShipmentStatusOrderItemSchema
    {
        return parent::offsetGet($key);
    }
}
