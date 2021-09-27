<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class PartneredSmallParcelPackageInputListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): PartneredSmallParcelPackageInputSchema
    {
        return parent::offsetGet($key);
    }
}
