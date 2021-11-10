<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class OrderItemBuyerInfoListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): OrderItemBuyerInfoSchema
    {
        return parent::offsetGet($key);
    }
}
