<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\CreateInboundShipmentPlanResultSchema;

class CreateInboundShipmentPlanResponse extends BaseResponse
{
    public ?CreateInboundShipmentPlanResultSchema $payload;
}
