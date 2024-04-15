<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\DataTransferObject;

class ReportDocumentSchema extends DataTransferObject
{
    public string $report_document_id;

    public string $url;

    #[StringEnumValidator(['GZIP'])]
    public ?string $compression_algorithm;
}
