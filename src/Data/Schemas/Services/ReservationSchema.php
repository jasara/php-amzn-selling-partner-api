<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReservationSchema extends BaseSchema
{
    public function __construct(
        public ?string $reservation_id = null,
        public ?string $type = null,
        public ?AvailabilityRecordSchema $availability = null,
    ) {}
}
