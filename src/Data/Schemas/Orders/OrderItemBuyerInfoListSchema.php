<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Illuminate\Support\Collection;

class OrderItemBuyerInfoListSchema extends Collection
{
    public function offsetGet($key): OrderItemBuyerInfoSchema
    {
        return parent::offsetGet($key);
    }
}
