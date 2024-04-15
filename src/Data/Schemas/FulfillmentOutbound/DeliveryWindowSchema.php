<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class DeliveryWindowSchema extends DataTransferObject
{
    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $start_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $end_date;
}
