<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class GetFeaturesListSchema extends Collection
{
    public function offsetGet($key): FeaturesSchema
    {
        return parent::offsetGet($key);
    }
}
