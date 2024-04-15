<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Illuminate\Support\Collection;

class FeatureSettingListSchema extends Collection
{
    public function offsetGet($key): FeatureSettingShema
    {
        return parent::offsetGet($key);
    }
}
