<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentInbound;

use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound\InboundShipmentResultSchema;
use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentResponse extends DataTransferObject
{
    public InboundShipmentResultSchema $payload;
}
