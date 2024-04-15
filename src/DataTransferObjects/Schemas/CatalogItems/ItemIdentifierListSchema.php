<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemIdentifierListSchema extends Collection
{
    public function offsetGet($key): ItemIdentifierSchema
    {
        return parent::offsetGet($key);
    }
}
