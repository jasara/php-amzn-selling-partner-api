<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentOrderListSchema extends Collection
{
    public function offsetGet($key): FulfillmentOrderSchema
    {
        return parent::offsetGet($key);
    }
}
