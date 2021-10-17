<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFullfillment;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\GetEligibleShipmentServicesResultSchema;

class GetEligibleShipmentServicesResponse extends BaseResponse
{
    public ?GetEligibleShipmentServicesResultSchema $payload;
}
