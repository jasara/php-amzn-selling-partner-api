<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ListingsItems;

use Illuminate\Support\Collection;

class AttributesListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): AttributeSchema
    {
        return parent::offsetGet($key);
    }
}
