<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportListSchema;

class GetReportsResponse extends BaseResponse
{
    public function __construct(
        public ReportListSchema $reports,
        public ?string $next_token,
    ) {
    }
}
