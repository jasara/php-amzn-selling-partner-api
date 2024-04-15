<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class UnfulfillablePreviewItemListSchema extends Collection
{
    public function offsetGet($key): FulfillmentPreviewItemSchema
    {
        return parent::offsetGet($key);
    }
}
