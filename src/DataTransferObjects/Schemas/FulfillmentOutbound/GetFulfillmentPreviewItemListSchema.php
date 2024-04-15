<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class GetFulfillmentPreviewItemListSchema extends Collection
{
    public function offsetGet($key): GetFulfillmentPreviewItemSchema
    {
        return parent::offsetGet($key);
    }
}
