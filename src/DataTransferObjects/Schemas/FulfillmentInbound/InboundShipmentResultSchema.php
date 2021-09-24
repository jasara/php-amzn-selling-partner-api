<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentResultSchema extends DataTransferObject
{
    public string $shipment_id;
}
