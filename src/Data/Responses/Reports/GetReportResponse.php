<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportSchema;

class GetReportResponse extends BaseResponse
{
    public ?ReportSchema $report;
}
