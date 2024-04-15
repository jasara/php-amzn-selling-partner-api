<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InboundShipmentPlanRequestItemListSchema extends Collection
{
    public function offsetGet($key): InboundShipmentPlanRequestItemSchema
    {
        return parent::offsetGet($key);
    }
}
