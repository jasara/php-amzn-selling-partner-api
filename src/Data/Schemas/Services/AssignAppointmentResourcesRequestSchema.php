<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AssignAppointmentResourcesRequestSchema extends BaseSchema
{
    public function __construct(
        public ?AppointmentResourcesSchema $resources = null,
    ) {}
}
