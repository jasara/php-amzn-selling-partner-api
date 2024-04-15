<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class ReturnAuthorizationListSchema extends Collection
{
    public function offsetGet($key): ReturnAuthorizationSchema
    {
        return parent::offsetGet($key);
    }
}
