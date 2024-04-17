<?php

namespace Jasara\AmznSPA\Data\Requests\MerchantFulfillment;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;

class GetAdditionalSellerInputsRequest extends BaseRequest
{
    public function __construct(
        public string $shipping_service_id,
        public AddressSchema $ship_from_address,
        public string $order_id,
    ) {
    }
}
