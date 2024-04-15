<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class CreateReturnItemListSchema extends Collection
{
    public function offsetGet($key): CreateReturnItemSchema
    {
        return parent::offsetGet($key);
    }
}
