<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class BoundedIntervalSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public CarbonImmutable $start_time,
        #[CarbonFromStringCaster]
        public CarbonImmutable $end_time,
    ) {
    }
}
