<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SelfShipAppointmentSlotsAvailabilitySchema extends BaseSchema
{
    public function __construct(
        public ?CarbonImmutable $expires_at,
        public ?AppointmentSlotListSchema $slots,
    ) {
    }
}
