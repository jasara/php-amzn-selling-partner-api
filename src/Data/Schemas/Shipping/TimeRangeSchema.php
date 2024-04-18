<?php

namespace Jasara\AmznSPA\Data\Schemas\Shipping;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TimeRangeSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $start,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $end,
    ) {
    }
}
