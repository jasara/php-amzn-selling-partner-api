<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class GetFeaturesResultSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): FeaturesSchema
    {
        return parent::offsetGet($key);
    }
}
