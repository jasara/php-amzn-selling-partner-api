<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\PurchaseShipmentResultSchema;

class PurchaseShipmentResponse extends BaseResponse
{
    public ?PurchaseShipmentResultSchema $payload;
}
