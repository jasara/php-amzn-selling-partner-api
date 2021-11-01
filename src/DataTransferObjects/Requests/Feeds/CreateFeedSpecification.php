<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Feeds;

use Jasara\AmznSPA\Constants\AmazonEnums;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

class CreateFeedSpecification extends BaseRequest
{
    #[StringEnumValidator(AmazonEnums::FEED_TYPES)]
    public string $feed_type;

    public array $marketplace_ids;

    public string $input_feed_document_id;

    public ?array $feed_options;
}
