<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Validators\StringEnumValidator;

class CreateFeedDocumentSpecification extends BaseRequest
{
    public string $content_type;
}
