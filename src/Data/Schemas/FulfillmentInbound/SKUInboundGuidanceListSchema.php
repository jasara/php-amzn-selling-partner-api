<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class SkuInboundGuidanceListSchema extends Collection
{
    public function offsetGet($key): SkuInboundGuidanceSchema
    {
        return parent::offsetGet($key);
    }
}
