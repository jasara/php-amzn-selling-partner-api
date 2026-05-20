<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateReservationRecordSchema extends BaseSchema
{
    public function __construct(
        public ?ReservationSchema $reservation = null,
        public ?WarningListSchema $warnings = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
