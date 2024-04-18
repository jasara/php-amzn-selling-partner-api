<?php

namespace Jasara\AmznSPA\Data\Responses\Reports;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Reports\ReportDocumentSchema;

class GetReportDocumentResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ReportDocumentSchema $report_document,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'report_document';
    }
}
