<?php

namespace Jasara\AmznSPA\Data\Requests\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;

class CreateReportSpecification extends BaseRequest
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
        public string $report_type,
        public array $marketplace_ids,
        public ?CarbonImmutable $data_start_time = null,
        public ?CarbonImmutable $data_end_time = null,
        public ?array $report_options = null,
    ) {
    }
}
