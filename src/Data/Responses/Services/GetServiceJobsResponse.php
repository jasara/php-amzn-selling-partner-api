<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Services;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Services\JobListingSchema;

class GetServiceJobsResponse extends BaseResponse
{
    public function __construct(
        public ?JobListingSchema $payload = null,
    ) {}

}
