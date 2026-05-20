<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AppointmentSchema extends BaseSchema
{
    public function __construct(
        public ?string $appointment_id = null,
        public ?string $appointment_status = null,
        public ?AppointmentTimeSchema $appointment_time = null,
        public ?array $assigned_technicians = null,
        public ?string $rescheduled_appointment_id = null,
        public ?PoaSchema $poa = null,
    ) {}
}
