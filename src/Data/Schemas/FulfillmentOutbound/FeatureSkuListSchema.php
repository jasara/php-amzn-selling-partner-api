<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FeatureSkuListSchema extends Collection
{
    public function offsetGet($key): FeatureSkuSchema
    {
        return parent::offsetGet($key);
    }
}
