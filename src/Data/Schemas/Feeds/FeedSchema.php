<?php

namespace Jasara\AmznSPA\Data\Schemas\Feeds;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeedSchema extends BaseSchema
{
    public function __construct(
        public string $feed_id,
        public string $feed_type,
        public ?array $marketplace_ids,
        #[CarbonFromStringCaster]
        public CarbonImmutable $created_time,
        #[StringEnumValidator(AmazonEnums::PROCESSING_STATUSES)]
        public string $processing_status,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $processing_start_time,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $processing_end_time,
        public ?string $result_feed_document_id,
    ) {
    }
}
