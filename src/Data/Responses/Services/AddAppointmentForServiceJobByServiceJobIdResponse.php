<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Services;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Services\WarningListSchema;

class AddAppointmentForServiceJobByServiceJobIdResponse extends BaseResponse
{
    public function __construct(
        public ?string $appointment_id = null,
        public ?WarningListSchema $warnings = null,
    ) {}

}
