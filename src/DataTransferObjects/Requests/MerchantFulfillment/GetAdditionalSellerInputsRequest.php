<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;

class GetAdditionalSellerInputsRequest extends BaseRequest
{
    public string $shipping_service_id;

    public AddressSchema $ship_from_address;

    public string $order_id;
}
