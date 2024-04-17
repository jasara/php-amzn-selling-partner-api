<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class CreateFeedDocumentResponse extends BaseResponse
{
    public function __construct(
        public string $feed_document_id,
        public string $url,
    ) {
    }
}
