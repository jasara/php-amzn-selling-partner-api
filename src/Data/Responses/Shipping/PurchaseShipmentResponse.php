<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\PurchaseShipmentResultSchema;

class PurchaseShipmentResponse extends BaseResponse
{
    public ?PurchaseShipmentResultSchema $payload;
}
