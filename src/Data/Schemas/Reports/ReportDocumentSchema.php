<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReportDocumentSchema extends BaseSchema
{
    public function __construct(
        public string $report_document_id,
        public string $url,
        #[StringEnumValidator(['GZIP'])]
        public ?string $compression_algorithm,
    ) {
    }
}
