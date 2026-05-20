<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TechnicianSchema extends BaseSchema
{
    public function __construct(
        public ?string $technician_id = null,
        public ?string $name = null,
    ) {}
}
