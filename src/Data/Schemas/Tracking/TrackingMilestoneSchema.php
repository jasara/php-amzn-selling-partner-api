<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingMilestoneSchema extends BaseSchema
{
    public function __construct(
        public TrackingMilestoneStatusSchema $status,
        #[CarbonFromStringCaster]
        public CarbonImmutable $occurred_at,
        public ?TrackingMilestoneLocationSchema $location = null,
    ) {
    }
}
