<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class UpdateShipmentStatusOrderItemListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): UpdateShipmentStatusOrderItemSchema
    {
        return parent::offsetGet($key);
    }
}
