<?php

namespace Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InvalidASINListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): InvalidASINSchema
    {
        return parent::offsetGet($key);
    }
}
