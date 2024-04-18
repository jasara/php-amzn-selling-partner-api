<?php

namespace Jasara\AmznSPA\Data\Responses\MerchantFulfillment;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\GetEligibleShipmentServicesResultSchema;

class GetEligibleShipmentServicesResponse extends BaseResponse
{
    public function __construct(
        public ?GetEligibleShipmentServicesResultSchema $payload,
    ) {
    }
}
