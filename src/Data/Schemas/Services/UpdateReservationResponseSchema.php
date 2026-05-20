<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class UpdateReservationResponseSchema extends BaseSchema
{
    public function __construct(
        public ?UpdateReservationRecordSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
