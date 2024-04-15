<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class PartneredSmallParcelPackageInputListSchema extends Collection
{
    public function offsetGet($key): PartneredSmallParcelPackageInputSchema
    {
        return parent::offsetGet($key);
    }
}
