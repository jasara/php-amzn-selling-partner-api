<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20220401;

use Illuminate\Support\Collection;

class ItemListSchema extends Collection
{
    public function offsetGet($key): ItemSchema
    {
        return parent::offsetGet($key);
    }
}
