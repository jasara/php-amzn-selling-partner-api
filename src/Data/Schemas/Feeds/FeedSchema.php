<?php

namespace Jasara\AmznSPA\Data\Schemas\Feeds;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Validators\StringEnumValidator;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class FeedSchema extends DataTransferObject
{
    public string $feed_id;

    public string $feed_type;

    public ?array $marketplace_ids;

    #[CastWith(CarbonFromStringCaster::class)]
    public CarbonImmutable $created_time;

    #[StringEnumValidator(AmazonEnums::PROCESSING_STATUSES)]
    public string $processing_status;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $processing_start_time;

    #[CastWith(CarbonFromStringCaster::class)]
    public ?CarbonImmutable $processing_end_time;

    public ?string $result_feed_document_id;
}
