<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class TermsAndConditionsNotAcceptedCarrierSchema extends DataTransferObject
{
    public string $carrier_name;
}
