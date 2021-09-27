<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentInbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetShipmentsResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: InboundShipmentInfoSchema::class)]
    public InboundShipmentListSchema $shipment_data;

    public ?string $next_token;
}
