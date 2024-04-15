<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FeeListSchema extends Collection
{
    public function offsetGet($key): FeeSchema
    {
        return parent::offsetGet($key);
    }
}
