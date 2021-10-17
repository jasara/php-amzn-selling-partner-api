<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFullfillment\LabelFormatOptionSchema;

class AvailableFormatOptionsForLabelList extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): LabelFormatOptionSchema
    {
        return parent::offsetGet($key);
    }
}
