<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RescheduleAppointmentRequestSchema extends BaseSchema
{
    public function __construct(
        public ?AppointmentTimeInputSchema $appointment_time = null,
        public ?string $reschedule_reason_code = null,
    ) {}
}
