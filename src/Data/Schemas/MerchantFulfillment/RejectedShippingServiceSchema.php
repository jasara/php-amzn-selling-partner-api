<?php

namespace Jasara\AmznSPA\Data\Schemas\MerchantFulfillment;

use Spatie\DataTransferObject\DataTransferObject;

class RejectedShippingServiceSchema extends DataTransferObject
{
    public string $carrier_name;

    public string $shipping_service_name;

    public string $shipping_service_id;

    public string $rejection_reason_code;

    public ?string $rejection_reason_message;
}
