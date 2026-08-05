<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingMilestoneStatusSchema extends BaseSchema
{
    public function __construct(
        public string $code,
        public string $description,
        public ?string $sub_code = null,
    ) {
    }
}
