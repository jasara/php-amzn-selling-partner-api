<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class PaymentMethodDetailItemListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): string
    {
        return parent::offsetGet($key);
    }
}
