<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AppointmentSlotReportSchema extends BaseSchema
{
    public function __construct(
        public ?string $scheduling_type = null,
        public ?string $start_time = null,
        public ?string $end_time = null,
        public ?array $appointment_slots = null,
    ) {}
}
