<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class PrepDetailsListSchema extends Collection
{
    public function offsetGet($key): PrepDetailsSchema
    {
        return parent::offsetGet($key);
    }
}
