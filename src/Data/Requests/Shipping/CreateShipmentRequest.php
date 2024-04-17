<?php

namespace Jasara\AmznSPA\Data\Requests\Shipping;

use Jasara\AmznSPA\Data\Base\Validators\MaxLengthValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Shipping\ContainerListSchema;
use Jasara\AmznSPA\Data\Schemas\ShippingAddressSchema;

class CreateShipmentRequest extends BaseRequest
{
    public function __construct(
        #[MaxLengthValidator(40)]
        public string $client_reference_id,
        public ShippingAddressSchema $ship_to,
        public ShippingAddressSchema $ship_from,
        public ContainerListSchema $containers,
    ) {
    }
}
