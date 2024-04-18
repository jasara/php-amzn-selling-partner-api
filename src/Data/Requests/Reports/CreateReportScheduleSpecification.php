<?php

namespace Jasara\AmznSPA\Data\Requests\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;

class CreateReportScheduleSpecification extends BaseRequest
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
        public string $report_type,
        #[StringEnumValidator(AmazonEnums::REPORT_PERIODS)]
        public string $period,
        public array $marketplace_ids,
        public ?array $report_options = null,
        public ?CarbonImmutable $next_report_creation_time = null,
    ) {
    }
}
