<?php

namespace Jasara\AmznSPA\Data\Schemas\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ReportScheduleSchema extends DataTransferObject
{
    public string $report_schedule_id;

    #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
    public string $report_type;

    public ?array $marketplace_ids;

    public ?array $report_options;

    #[StringEnumValidator(AmazonEnums::REPORT_PERIODS)]
    public string $period;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $next_report_creation_time;
}
