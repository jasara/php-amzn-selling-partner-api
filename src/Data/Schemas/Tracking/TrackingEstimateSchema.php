<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingEstimateSchema extends BaseSchema
{
    public function __construct(
        public string $type,
        public BoundedIntervalSchema $estimated_interval,
        #[CarbonFromStringCaster]
        public CarbonImmutable $last_updated_time,
    ) {
    }
}
