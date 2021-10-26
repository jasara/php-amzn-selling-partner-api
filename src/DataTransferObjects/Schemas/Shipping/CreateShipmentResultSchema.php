<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class CreateShipmentResultSchema extends DataTransferObject
{
    public string $shipment_id;

    #[CastWith(ArrayCaster::class, itemType: RateSchema::class)]
    public RateListSchema $eligible_rates;
}
