<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class NonPartneredSmallParcelPackageInputListSchema extends Collection
{
    public function offsetGet($key): NonPartneredSmallParcelPackageInputSchema
    {
        return parent::offsetGet($key);
    }
}
