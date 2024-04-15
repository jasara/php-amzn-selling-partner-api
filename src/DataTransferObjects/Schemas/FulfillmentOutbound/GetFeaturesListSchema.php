<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class GetFeaturesListSchema extends Collection
{
    public function offsetGet($key): FeaturesSchema
    {
        return parent::offsetGet($key);
    }
}
