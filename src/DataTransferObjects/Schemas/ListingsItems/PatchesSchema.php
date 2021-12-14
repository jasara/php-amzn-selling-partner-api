<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class PatchesSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): PatchOperationSchema
    {
        return parent::offsetGet($key);
    }
}
