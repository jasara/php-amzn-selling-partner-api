<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportDocumentSchema;

class GetReportDocumentResponse extends BaseResponse
{
    public function __construct(
        public ReportDocumentSchema $report_document,
    ) {
    }
}
