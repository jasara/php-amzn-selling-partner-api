<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class PaymentExecutionDetailItemListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): PaymentExecutionDetailItemSchema
    {
        return parent::offsetGet($key);
    }
}
