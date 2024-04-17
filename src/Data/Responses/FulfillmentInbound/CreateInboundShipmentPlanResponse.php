<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\CreateInboundShipmentPlanResultSchema;

class CreateInboundShipmentPlanResponse extends BaseResponse
{
    public function __construct(
        public ?CreateInboundShipmentPlanResultSchema $payload,
    ) {
    }
}
