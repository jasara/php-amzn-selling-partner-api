<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\GetEligibleShipmentServicesResultSchema;

class GetEligibleShipmentServicesResponse extends BaseResponse
{
    public ?GetEligibleShipmentServicesResultSchema $payload;
}
