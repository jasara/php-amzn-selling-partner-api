<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class SkuPrepInstructionsListSchema extends Collection
{
    public function offsetGet($key): SkuPrepInstructionsSchema
    {
        return parent::offsetGet($key);
    }
}
