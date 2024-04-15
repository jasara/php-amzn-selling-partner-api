<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\CatalogItems;

use Illuminate\Support\Collection;

class ItemImageListSchema extends Collection
{
    public function offsetGet($key): ItemImageSchema
    {
        return parent::offsetGet($key);
    }
}
