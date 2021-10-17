<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;

class CreateFeedDocumentSpecification extends BaseRequest
{
    public string $content_type;
}
