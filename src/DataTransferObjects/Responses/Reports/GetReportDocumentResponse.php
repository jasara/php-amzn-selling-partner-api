<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Reports;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Reports\ReportDocumentSchema;

class GetReportDocumentResponse extends BaseResponse
{
    public ReportDocumentSchema $report_document;
}
