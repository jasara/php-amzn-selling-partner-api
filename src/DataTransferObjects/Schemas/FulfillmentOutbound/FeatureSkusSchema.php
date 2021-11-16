<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FeatureSkusSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): FeatureSkuSchema
    {
        return parent::offsetGet($key);
    }
}
