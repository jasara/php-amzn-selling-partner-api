<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class CreateFulfillmentOrderItemListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): CreateFulfillmentOrderItemSchema
    {
        return parent::offsetGet($key);
    }
}
