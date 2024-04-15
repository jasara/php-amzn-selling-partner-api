<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InboundShipmentPlanRequestItemListSchema extends Collection
{
    public function offsetGet($key): InboundShipmentPlanRequestItemSchema
    {
        return parent::offsetGet($key);
    }
}
