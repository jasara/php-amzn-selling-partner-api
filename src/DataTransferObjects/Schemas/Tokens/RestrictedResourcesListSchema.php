<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Tokens;

use Illuminate\Support\Collection;

class RestrictedResourcesListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): RestrictedResourceSchema
    {
        return parent::offsetGet($key);
    }
}
