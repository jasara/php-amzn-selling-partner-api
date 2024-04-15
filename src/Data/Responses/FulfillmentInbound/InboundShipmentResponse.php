<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentInbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\InboundShipmentResultSchema;

class InboundShipmentResponse extends BaseResponse
{
    public ?InboundShipmentResultSchema $payload;
}
