<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Services;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class UpdateScheduleResponse extends BaseResponse
{
    public function __construct(
        public ?array $payload = null,
    ) {}

}
