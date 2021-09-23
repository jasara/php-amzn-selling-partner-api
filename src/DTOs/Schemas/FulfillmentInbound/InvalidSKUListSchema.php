<?php

namespace Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InvalidSKUListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): InvalidSKUSchema
    {
        return parent::offsetGet($key);
    }
}
