<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ItemDeliveryPromiseSchema extends BaseSchema
{
    public function __construct(
        public ?string $start_time = null,
        public ?string $end_time = null,
    ) {}
}
