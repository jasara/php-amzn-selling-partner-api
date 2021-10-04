<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;

class CreateFeedDocumentResponse extends BaseResponse
{
    public string $feed_document_id;

    public string $url;
}
