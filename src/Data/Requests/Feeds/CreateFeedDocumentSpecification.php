<?php

namespace Jasara\AmznSPA\Data\Requests\Feeds;

use Jasara\AmznSPA\Data\Requests\BaseRequest;

class CreateFeedDocumentSpecification extends BaseRequest
{
    public function __construct(
        public string $content_type,
    ) {
    }
}
