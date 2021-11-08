<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\ShipmentSchema;

class GetShipmentResponse extends BaseResponse
{
    public ?ShipmentSchema $payload;
}
