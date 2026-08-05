<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Tracking;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

final class TrackingIdentifierSchema extends BaseSchema
{
    public function __construct(
        public ?string $id = null,
        public ?CarrierTrackingSchema $carrier_tracking = null,
        public ?string $acsin = null,
        public ?string $aftn = null,
        public ?string $container_number = null,
        public ?string $house_bill_of_lading_number = null,
    ) {
    }
}
