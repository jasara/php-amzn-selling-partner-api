<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class AvailableFormatOptionsForLabelListSchema extends Collection
{
    public function offsetGet($key): LabelFormatOptionSchema
    {
        return parent::offsetGet($key);
    }
}
