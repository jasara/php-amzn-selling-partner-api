<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class SKUInboundGuidanceListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): SKUInboundGuidanceSchema
    {
        return parent::offsetGet($key);
    }
}
