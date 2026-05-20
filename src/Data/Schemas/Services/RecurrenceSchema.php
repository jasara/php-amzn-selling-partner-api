<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RecurrenceSchema extends BaseSchema
{
    public function __construct(
        public ?string $end_time = null,
        public ?array $days_of_week = null,
        public ?array $days_of_month = null,
    ) {}
}
