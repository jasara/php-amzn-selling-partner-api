<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\CreateShipmentResultSchema;

class CreateShipmentResponse extends BaseResponse
{
    public ?CreateShipmentResultSchema $payload;
}
