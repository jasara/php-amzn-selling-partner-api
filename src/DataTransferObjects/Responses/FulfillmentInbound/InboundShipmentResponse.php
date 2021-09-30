<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentResultSchema;

class InboundShipmentResponse extends BaseResponse
{
    public ?InboundShipmentResultSchema $payload;
}
