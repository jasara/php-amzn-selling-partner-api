<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AppointmentTimeInputSchema extends BaseSchema
{
    public function __construct(
        public ?string $start_time = null,
        public ?int $duration_in_minutes = null,
    ) {}
}
