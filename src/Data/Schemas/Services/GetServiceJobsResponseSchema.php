<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetServiceJobsResponseSchema extends BaseSchema
{
    public function __construct(
        public ?JobListingSchema $payload = null,
        public ?ErrorListSchema $errors = null,
    ) {}
}
