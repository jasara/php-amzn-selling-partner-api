<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportSchema;

class GetReportResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?ReportSchema $report,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'report';
    }
}
