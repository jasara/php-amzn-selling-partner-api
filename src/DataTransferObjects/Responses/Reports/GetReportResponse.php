<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Reports;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportSchema;

class GetReportResponse extends BaseResponse
{
    public ?ReportSchema $report;
}
