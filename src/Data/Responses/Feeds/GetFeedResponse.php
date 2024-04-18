<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedSchema;

class GetFeedResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?FeedSchema $feed,
    ) {
    }

    public static function mapResponseToParameter(): string
    {
        return 'feed';
    }
}
