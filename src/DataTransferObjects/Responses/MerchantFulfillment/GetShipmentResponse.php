<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\ShipmentSchema;

class GetShipmentResponse extends BaseResponse
{
    public ?ShipmentSchema $payload;
}
