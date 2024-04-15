<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class ASINInboundGuidanceListSchema extends Collection
{
    public function offsetGet($key): ASINInboundGuidanceSchema
    {
        return parent::offsetGet($key);
    }
}
