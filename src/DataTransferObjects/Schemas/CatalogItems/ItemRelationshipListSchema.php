<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemRelationshipListSchema extends Collection
{
    public function offsetGet($key): ItemRelationshipSchema
    {
        return parent::offsetGet($key);
    }
}
