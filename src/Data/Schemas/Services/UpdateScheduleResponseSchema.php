<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class UpdateScheduleResponseSchema extends BaseSchema
{
    public function __construct(
        public ?array $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
