<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class ReasonCodeDetailsListSchema extends Collection
{
    public function offsetGet($key): ReasonCodeDetailsSchema
    {
        return parent::offsetGet($key);
    }
}
