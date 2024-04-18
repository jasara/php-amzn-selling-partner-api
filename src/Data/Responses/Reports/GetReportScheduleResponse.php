<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportScheduleSchema;

class GetReportScheduleResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ReportScheduleSchema $report_schedule,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'report_schedule';
    }
}
