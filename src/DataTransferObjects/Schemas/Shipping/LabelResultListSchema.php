<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Illuminate\Support\Collection;

class LabelResultListSchema extends Collection
{
    public function offsetGet($key): LabelResultSchema
    {
        return parent::offsetGet($key);
    }
}
