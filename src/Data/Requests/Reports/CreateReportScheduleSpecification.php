<?php

namespace Jasara\AmznSPA\Data\Requests\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;

class CreateReportScheduleSpecification extends BaseRequest
{
    #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
    public string $report_type;

    #[StringEnumValidator(AmazonEnums::REPORT_PERIODS)]
    public string $period;

    public array $marketplace_ids;

    public ?array $report_options;

    public ?CarbonImmutable $next_report_creation_time;
}
