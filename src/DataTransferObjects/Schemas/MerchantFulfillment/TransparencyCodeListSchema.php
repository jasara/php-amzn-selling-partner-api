<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class TransparencyCodeListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): string
    {
        return parent::offsetGet($key);
    }
}
