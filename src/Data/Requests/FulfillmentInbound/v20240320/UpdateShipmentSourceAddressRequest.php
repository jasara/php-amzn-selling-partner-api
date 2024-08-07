<?php

namespace Jasara\AmznSPA\Data\Requests\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\AddressSchema;

class UpdateShipmentSourceAddressRequest extends BaseRequest
{
    public function __construct(
        public AddressSchema $address,
    ) {
    }
}
