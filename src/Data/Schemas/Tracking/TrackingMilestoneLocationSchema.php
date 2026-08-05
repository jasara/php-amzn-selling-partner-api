<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingMilestoneLocationSchema extends BaseSchema
{
    public function __construct(
        public ?TrackingMilestoneAddressSchema $address = null,
    ) {
    }
}
