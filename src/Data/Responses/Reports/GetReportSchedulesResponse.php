<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportScheduleListSchema;

class GetReportSchedulesResponse extends BaseResponse
{
    public function __construct(
        public ReportScheduleListSchema $report_schedules,
    ) {
    }
}
