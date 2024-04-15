<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class AmazonPrepFeesDetailsListSchema extends Collection
{
    public function offsetGet($key): AmazonPrepFeesDetailsSchema
    {
        return parent::offsetGet($key);
    }
}
