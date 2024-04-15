<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentPreviewShipmentListSchema extends Collection
{
    public function offsetGet($key): FulfillmentPreviewShipmentSchema
    {
        return parent::offsetGet($key);
    }
}
