<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

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
