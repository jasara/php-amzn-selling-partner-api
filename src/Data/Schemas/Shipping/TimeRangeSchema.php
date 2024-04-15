<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class TimeRangeSchema extends DataTransferObject
{
    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $start;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $end;
}
