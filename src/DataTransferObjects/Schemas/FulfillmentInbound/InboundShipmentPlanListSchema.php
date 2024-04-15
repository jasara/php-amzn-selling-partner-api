<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class InboundShipmentPlanListSchema extends Collection
{
    public function offsetGet($key): InboundShipmentPlanSchema
    {
        return parent::offsetGet($key);
    }
}
