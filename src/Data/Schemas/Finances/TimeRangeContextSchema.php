<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TimeRangeContextSchema extends BaseSchema
{
    public function __construct(
        public ?string $start_time = null,
        public ?string $end_time = null,
    ) {}
}
