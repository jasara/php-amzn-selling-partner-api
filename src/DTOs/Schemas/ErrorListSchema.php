<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

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
