<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class NonPartneredSmallParcelPackageOutputListSchema extends Collection
{
    public function offsetGet($key): NonPartneredSmallParcelPackageOutputSchema
    {
        return parent::offsetGet($key);
    }
}
