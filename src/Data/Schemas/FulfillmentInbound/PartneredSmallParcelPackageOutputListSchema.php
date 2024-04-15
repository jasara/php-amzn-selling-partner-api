<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class PartneredSmallParcelPackageOutputListSchema extends Collection
{
    public function offsetGet($key): PartneredSmallParcelPackageOutputSchema
    {
        return parent::offsetGet($key);
    }
}
