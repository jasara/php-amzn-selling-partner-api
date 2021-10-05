<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Reports;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportScheduleListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportScheduleSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetReportSchedulesResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: ReportScheduleSchema::class)]
    public ReportScheduleListSchema $report_schedules;
}
