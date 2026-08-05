<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingMilestoneAddressSchema extends BaseSchema
{
    public function __construct(
        public ?string $city = null,
        public ?string $region = null,
        public ?string $country_code = null,
    ) {
    }
}
