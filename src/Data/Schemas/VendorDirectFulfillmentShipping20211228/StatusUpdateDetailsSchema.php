<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class StatusUpdateDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $tracking_number = null,
        public ?string $status_code = null,
        public ?string $reason_code = null,
        public ?string $status_date_time = null,
        public ?AddressSchema $status_location_address = null,
        public ?ShipmentScheduleSchema $shipment_schedule = null,
    ) {}
}
