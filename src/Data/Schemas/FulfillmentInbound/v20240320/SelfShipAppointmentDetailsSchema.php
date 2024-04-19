<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SelfShipAppointmentDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $appointment_id,
        public ?AppointmentSlotTimeSchema $appointment_slot_time,
        public ?string $appointment_status,
    ) {
    }
}
