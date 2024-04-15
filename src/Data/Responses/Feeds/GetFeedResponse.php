<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedSchema;

class GetFeedResponse extends BaseResponse
{
    public ?FeedSchema $feed;
}
