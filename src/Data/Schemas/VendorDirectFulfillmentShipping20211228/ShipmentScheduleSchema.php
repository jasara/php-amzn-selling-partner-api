<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentScheduleSchema extends BaseSchema
{
    public function __construct(
        public ?string $estimated_delivery_date_time = null,
        public ?string $appt_window_start_date_time = null,
        public ?string $appt_window_end_date_time = null,
    ) {}
}
