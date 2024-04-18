<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReportScheduleSchema extends BaseSchema
{
    public function __construct(
        public string $report_schedule_id,
        #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
        public string $report_type,
        public ?array $marketplace_ids,
        public ?array $report_options,
        #[StringEnumValidator(AmazonEnums::REPORT_PERIODS)]
        public string $period,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $next_report_creation_time,
    ) {
    }
}
