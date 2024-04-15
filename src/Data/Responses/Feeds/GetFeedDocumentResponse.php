<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedDocumentSchema;

class GetFeedDocumentResponse extends BaseResponse
{
    public FeedDocumentSchema $feed_document;
}
