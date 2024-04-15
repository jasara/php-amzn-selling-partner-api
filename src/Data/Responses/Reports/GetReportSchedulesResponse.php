<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportScheduleListSchema;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportScheduleSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetReportSchedulesResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ReportScheduleSchema::class)]
    public ReportScheduleListSchema $report_schedules;
}
