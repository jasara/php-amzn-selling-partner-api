<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class CarrierTrackingSchema extends BaseSchema
{
    public function __construct(
        public string $tracking_number,
        public ?string $carrier_code = null,
    ) {
    }
}
