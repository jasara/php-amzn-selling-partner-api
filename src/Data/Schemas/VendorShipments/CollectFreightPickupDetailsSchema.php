<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorShipments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CollectFreightPickupDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $requested_pick_up = null,
        public ?string $scheduled_pick_up = null,
        public ?string $carrier_assignment_date = null,
    ) {}
}
