<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Illuminate\Support\Collection;

class TermsAndConditionsNotAcceptedCarrierListSchema extends Collection
{
    public function offsetGet($key): TermsAndConditionsNotAcceptedCarrierSchema
    {
        return parent::offsetGet($key);
    }
}
