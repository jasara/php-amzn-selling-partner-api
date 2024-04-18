<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TemporarilyUnavailableCarrierSchema extends BaseSchema
{
    public function __construct(
        public string $carrier_name,
    ) {
    }
}
