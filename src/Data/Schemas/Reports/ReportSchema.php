<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReportSchema extends BaseSchema
{
    public function __construct(
        public ?array $marketplace_ids,
        public string $report_id,
        #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
        public string $report_type,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $data_start_time,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $data_end_time,
        public ?string $report_schedule_id,
        #[CarbonFromStringCaster]
        public CarbonImmutable $created_time,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $processing_start_time,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $processing_end_time,
        #[StringEnumValidator(AmazonEnums::PROCESSING_STATUSES)]
        public string $processing_status,
        public ?string $report_document_id,
    ) {
    }
}
