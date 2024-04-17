<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportScheduleSchema;

class GetReportScheduleResponse extends BaseResponse
{
    public function __construct(
        public ReportScheduleSchema $report_schedule,
    ) {
    }
}
