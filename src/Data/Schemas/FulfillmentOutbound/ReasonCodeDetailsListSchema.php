<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class ReasonCodeDetailsListSchema extends Collection
{
    public function offsetGet($key): ReasonCodeDetailsSchema
    {
        return parent::offsetGet($key);
    }
}
