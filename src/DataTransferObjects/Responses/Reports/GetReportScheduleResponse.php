<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Reports;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportScheduleSchema;

class GetReportScheduleResponse extends BaseResponse
{
    public ReportScheduleSchema $report_schedule;
}
