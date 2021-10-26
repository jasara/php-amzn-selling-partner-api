<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class ConstraintsSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): constraintSchema
    {
        return parent::offsetGet($key);
    }
}
