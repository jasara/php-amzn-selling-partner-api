<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class TermsAndConditionsNotAcceptedCarrierSchema extends DataTransferObject
{
    public string $carrier_name;
}
