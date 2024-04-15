<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Illuminate\Support\Collection;

class ASINPrepInstructionsListSchema extends Collection
{
    public function offsetGet($key): ASINPrepInstructionsSchema
    {
        return parent::offsetGet($key);
    }
}
