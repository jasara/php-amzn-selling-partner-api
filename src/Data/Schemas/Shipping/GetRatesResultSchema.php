<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetRatesResultSchema extends DataTransferObject
{
    #[CastWith(ArrayCaster::class, itemType: RateSchema::class)]
    public ServiceRateListSchema $service_rates;
}
