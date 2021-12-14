<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Illuminate\Support\Collection;

class IncludedFeeDetailListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): IncludedFeeDetailSchema
    {
        return parent::offsetGet($key);
    }
}
