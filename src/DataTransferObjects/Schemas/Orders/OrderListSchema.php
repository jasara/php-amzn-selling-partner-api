<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class OrderListSchema extends Collection
{
    public function offsetGet($key): OrderSchema
    {
        return parent::offsetGet($key);
    }
}
