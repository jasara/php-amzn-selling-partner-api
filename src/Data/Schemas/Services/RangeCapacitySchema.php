<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RangeCapacitySchema extends BaseSchema
{
    public function __construct(
        public ?string $capacity_type = null,
        public ?array $slots = null,
    ) {}
}
