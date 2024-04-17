<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RejectedShippingServiceSchema extends BaseSchema
{
    public function __construct(
        public string $carrier_name,
        public string $shipping_service_name,
        public string $shipping_service_id,
        public string $rejection_reason_code,
        public ?string $rejection_reason_message,
    ) {
    }
}
