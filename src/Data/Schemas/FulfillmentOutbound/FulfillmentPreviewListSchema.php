<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentPreviewListSchema extends Collection
{
    public function offsetGet($key): FulfillmentPreviewSchema
    {
        return parent::offsetGet($key);
    }
}
