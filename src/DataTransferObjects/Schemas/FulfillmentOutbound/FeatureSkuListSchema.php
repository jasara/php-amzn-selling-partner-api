<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FeatureSkuListSchema extends Collection
{
    public function offsetGet($key): FeatureSkuSchema
    {
        return parent::offsetGet($key);
    }
}
