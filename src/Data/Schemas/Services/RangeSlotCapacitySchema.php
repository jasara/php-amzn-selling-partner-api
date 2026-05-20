<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RangeSlotCapacitySchema extends BaseSchema
{
    public function __construct(
        public ?string $resource_id = null,
        public ?array $capacities = null,
        public ?string $next_page_token = null,
    ) {}
}
