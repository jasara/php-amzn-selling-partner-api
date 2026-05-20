<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class JobListingSchema extends BaseSchema
{
    public function __construct(
        public ?int $total_result_size = null,
        public ?string $next_page_token = null,
        public ?string $previous_page_token = null,
        public ?array $jobs = null,
    ) {}
}
