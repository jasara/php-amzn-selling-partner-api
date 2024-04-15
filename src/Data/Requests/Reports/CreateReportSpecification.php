<?php

namespace Jasara\AmznSPA\Data\Requests\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;

class CreateReportSpecification extends BaseRequest
{
    #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
    public string $report_type;

    public array $marketplace_ids;

    public ?CarbonImmutable $data_start_time;

    public ?CarbonImmutable $data_end_time;

    public ?array $report_options;
}
