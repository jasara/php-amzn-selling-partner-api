<?php

namespace Jasara\AmznSPA\DTOs\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class ASINInboundGuidanceListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ASINInboundGuidanceSchema
    {
        return parent::offsetGet($key);
    }
}
