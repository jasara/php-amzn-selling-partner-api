<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RangeSlotCapacityQuerySchema extends BaseSchema
{
    public function __construct(
        public ?array $capacity_types = null,
        public ?string $start_date_time = null,
        public ?string $end_date_time = null,
    ) {}
}
