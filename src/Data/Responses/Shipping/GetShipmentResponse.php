<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\ShipmentSchema;

class GetShipmentResponse extends BaseResponse
{
    public function __construct(
        public ?ShipmentSchema $payload,
    ) {
    }
}
