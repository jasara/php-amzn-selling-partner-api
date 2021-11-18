<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class DeliveryWindowSchema extends DataTransferObject
{
    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $start_date;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $end_date;
}
