<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ScheduledDeliveryShipmentSchema extends BaseSchema
{
    public function __construct(
        public ?string $scheduled_delivery_service_type = null,
        public ?string $earliest_nominated_delivery_date = null,
        public ?string $latest_nominated_delivery_date = null,
    ) {}
}
