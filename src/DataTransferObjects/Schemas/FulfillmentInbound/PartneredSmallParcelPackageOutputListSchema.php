<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class PartneredSmallParcelPackageOutputListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): PartneredSmallParcelPackageOutputSchema
    {
        return parent::offsetGet($key);
    }
}
