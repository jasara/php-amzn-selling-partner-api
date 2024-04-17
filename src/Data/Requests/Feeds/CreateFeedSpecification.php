<?php

namespace Jasara\AmznSPA\Data\Requests\Feeds;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\Data\Base\Validators\StringEnumValidator;
use Jasara\AmznSPA\Data\Requests\BaseRequest;

class CreateFeedSpecification extends BaseRequest
{
    public function __construct(
        #[StringEnumValidator(AmazonEnums::FEED_TYPES)]
        public string $feed_type,
        public array $marketplace_ids,
        public string $input_feed_document_id,
        public ?array $feed_options = null,
    ) {
    }
}
