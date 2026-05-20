<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RangeSlotSchema extends BaseSchema
{
    public function __construct(
        public ?string $start_date_time = null,
        public ?string $end_date_time = null,
        public ?int $capacity = null,
    ) {}
}
