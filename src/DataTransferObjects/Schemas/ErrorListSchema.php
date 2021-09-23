<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas;

use Illuminate\Support\Collection;

class ErrorListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): ErrorSchema
    {
        return parent::offsetGet($key);
    }
}
