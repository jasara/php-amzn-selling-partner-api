<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class CreateReportScheduleResponse extends BaseResponse
{
    public function __construct(
        public string $report_schedule_id,
    ) {
    }
}
