<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Illuminate\Support\Collection;

class TaxClassificationsSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): TaxClassificationSchema
    {
        return parent::offsetGet($key);
    }
}
