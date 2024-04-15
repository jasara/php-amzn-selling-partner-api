<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class AmazonPrepFeesDetailsListSchema extends Collection
{
    public function offsetGet($key): AmazonPrepFeesDetailsSchema
    {
        return parent::offsetGet($key);
    }
}
