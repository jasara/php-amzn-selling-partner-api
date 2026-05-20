<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FixedSlotSchema extends BaseSchema
{
    public function __construct(
        public ?string $start_date_time = null,
        public ?int $scheduled_capacity = null,
        public ?int $available_capacity = null,
        public ?int $encumbered_capacity = null,
        public ?int $reserved_capacity = null,
    ) {}
}
