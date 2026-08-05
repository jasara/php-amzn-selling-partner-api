<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingDetailSchema extends BaseSchema
{
    public function __construct(
        public TrackingIdentifierSchema $identifier,
        public TrackingMilestoneListSchema $milestone_history,
        public ?string $tracking_url = null,
        public ?TrackingEstimateListSchema $tracking_estimates = null,
        public ?TrackingMilestoneSchema $latest_milestone = null,
    ) {
    }
}
