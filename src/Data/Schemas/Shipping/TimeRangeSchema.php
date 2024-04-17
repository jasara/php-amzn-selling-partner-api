<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class TimeRangeSchema extends BaseSchema
{
    public function __construct(
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $start,
        #[CastWith(CarbonFromStringCaster::class)]
        public ?CarbonImmutable $end,
    ) {
    }
}
