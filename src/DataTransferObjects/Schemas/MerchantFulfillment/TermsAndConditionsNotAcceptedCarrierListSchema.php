<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class TermsAndConditionsNotAcceptedCarrierListSchema extends Collection
{
    /**
     * @codeCoverageIgnore
     */
    public function offsetGet($key): TermsAndConditionsNotAcceptedCarrierSchema
    {
        return parent::offsetGet($key);
    }
}
