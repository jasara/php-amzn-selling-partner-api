<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentPreviewShipmentListSchema extends Collection
{
    public function offsetGet($key): FulfillmentPreviewShipmentSchema
    {
        return parent::offsetGet($key);
    }
}
