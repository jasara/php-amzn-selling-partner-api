<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentPreviewListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): FulfillmentPreviewSchema
    {
        return parent::offsetGet($key);
    }
}
