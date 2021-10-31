<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class TemporarilyUnavailableCarrierSchema extends DataTransferObject
{
    public string $carrier_name;
}
