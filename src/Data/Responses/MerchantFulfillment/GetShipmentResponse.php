<?php

namespace Jasara\AmznSPA\Data\Responses\MerchantFulfillment;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\ShipmentSchema;

class GetShipmentResponse extends BaseResponse
{
    public ?ShipmentSchema $payload;
}
