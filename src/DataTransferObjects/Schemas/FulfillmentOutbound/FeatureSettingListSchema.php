<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FeatureSettingListSchema extends Collection
{
    public function offsetGet($key): FeatureSettingShema
    {
        return parent::offsetGet($key);
    }
}
