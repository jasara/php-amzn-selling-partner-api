<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Illuminate\Support\Collection;

class OrderListSchema extends Collection
{
    public function offsetGet($key): OrderSchema
    {
        return parent::offsetGet($key);
    }
}
