<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\CreateShipmentResultSchema;

class CreateShipmentResponse extends BaseResponse
{
    public ?CreateShipmentResultSchema $payload;
}
