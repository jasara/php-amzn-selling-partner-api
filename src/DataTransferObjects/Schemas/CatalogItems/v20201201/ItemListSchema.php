<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems\v20201201;

use Illuminate\Support\Collection;

class ItemListSchema extends Collection
{
    public function offsetGet($key): ItemSchema
    {
        return parent::offsetGet($key);
    }
}
