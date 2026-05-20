<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class UpdateReservationRequestSchema extends BaseSchema
{
    public function __construct(
        public ?string $resource_id = null,
        public ?ReservationSchema $reservation = null,
    ) {}
}
