<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AvailableFormatOptionsForLabelListSchema extends Collection
{
    public function offsetGet($key): LabelFormatOptionSchema
    {
        return parent::offsetGet($key);
    }
}
