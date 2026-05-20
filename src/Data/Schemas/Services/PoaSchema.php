<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Services;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PoaSchema extends BaseSchema
{
    public function __construct(
        public ?AppointmentTimeSchema $appointment_time = null,
        public ?array $technicians = null,
        public ?string $uploading_technician = null,
        public ?string $upload_time = null,
        public ?string $poa_type = null,
    ) {}
}
