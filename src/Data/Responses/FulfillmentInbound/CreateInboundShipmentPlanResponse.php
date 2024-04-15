<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\CreateInboundShipmentPlanResultSchema;

class CreateInboundShipmentPlanResponse extends BaseResponse
{
    public ?CreateInboundShipmentPlanResultSchema $payload;
}
