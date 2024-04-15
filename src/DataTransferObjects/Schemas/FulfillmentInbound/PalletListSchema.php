<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class PalletListSchema extends Collection
{
    public function offsetGet($key): PalletSchema
    {
        return parent::offsetGet($key);
    }
}
