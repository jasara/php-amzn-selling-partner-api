<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FulfillmentShipmentPackageListSchema extends Collection
{
    public function offsetGet($key): FulfillmentShipmentPackageSchema
    {
        return parent::offsetGet($key);
    }
}
