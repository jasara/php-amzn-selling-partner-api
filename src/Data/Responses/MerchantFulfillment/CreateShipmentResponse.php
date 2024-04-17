<?php

namespace Jasara\AmznSPA\Data\Responses\MerchantFulfillment;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentSchema;

class CreateShipmentResponse extends BaseResponse
{
    public function __construct(
        public ?ShipmentSchema $payload,
    ) {
    }
}
