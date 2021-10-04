<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds\FeedDocumentSchema;

class GetFeedDocumentResponse extends BaseResponse
{
    public FeedDocumentSchema $feed_document;
}
