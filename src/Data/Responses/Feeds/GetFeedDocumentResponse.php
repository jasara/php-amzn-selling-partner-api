<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedDocumentSchema;

class GetFeedDocumentResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public FeedDocumentSchema $feed_document,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'feed_document';
    }
}
