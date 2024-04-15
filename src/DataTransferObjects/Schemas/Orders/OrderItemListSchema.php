<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class OrderItemListSchema extends Collection
{
    public function offsetGet($key): OrderItemSchema
    {
        return parent::offsetGet($key);
    }
}
