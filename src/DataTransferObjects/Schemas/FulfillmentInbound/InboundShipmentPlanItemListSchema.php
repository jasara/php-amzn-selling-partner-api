<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InboundShipmentPlanItemListSchema extends Collection
{
    public function offsetGet($key): InboundShipmentPlanItemSchema
    {
        return parent::offsetGet($key);
    }
}
