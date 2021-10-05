<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Reports;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class ReportSchema extends DataTransferObject
{
    public ?array $marketplace_ids;

    public string $report_id;

    #[StringEnumValidator(AmazonEnums::REPORT_TYPES)]
    public string $report_type;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $data_start_time;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $data_end_time;

    public ?string $report_schedule_id;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $created_time;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $processing_start_time;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $processing_end_time;

    public ?string $report_document_id;
}
