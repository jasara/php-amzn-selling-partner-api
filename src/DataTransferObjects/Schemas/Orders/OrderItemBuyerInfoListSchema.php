<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class OrderItemBuyerInfoListSchema extends Collection
{
    public function offsetGet($key): OrderItemBuyerInfoSchema
    {
        return parent::offsetGet($key);
    }
}
