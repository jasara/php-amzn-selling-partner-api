<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\DataTransferObject;

class InboundShipmentResultSchema extends DataTransferObject
{
    public string $shipment_id;
}
