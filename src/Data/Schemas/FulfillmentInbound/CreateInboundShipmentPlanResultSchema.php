<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CreateInboundShipmentPlanResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: InboundShipmentPlanSchema::class)]
    public ?InboundShipmentPlanListSchema $inbound_shipment_plans;
}
