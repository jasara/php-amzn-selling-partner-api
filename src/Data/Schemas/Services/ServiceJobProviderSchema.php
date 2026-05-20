<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ServiceJobProviderSchema extends BaseSchema
{
    public function __construct(
        public ?string $service_job_provider_id = null,
    ) {}
}
