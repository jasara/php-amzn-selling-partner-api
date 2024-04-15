<?php

namespace Jasara\AmznSPA\Data\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemIdentifierListSchema extends Collection
{
    public function offsetGet($key): ItemIdentifierSchema
    {
        return parent::offsetGet($key);
    }
}
