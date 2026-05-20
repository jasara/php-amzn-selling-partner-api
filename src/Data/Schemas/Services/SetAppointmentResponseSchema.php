<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SetAppointmentResponseSchema extends BaseSchema
{
    public function __construct(
        public ?string $appointment_id = null,
        public ?WarningListSchema $warnings = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
