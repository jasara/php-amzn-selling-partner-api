<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class PaymentExecutionDetailItemListSchema extends Collection
{
    public function offsetGet($key): PaymentExecutionDetailItemSchema
    {
        return parent::offsetGet($key);
    }
}
