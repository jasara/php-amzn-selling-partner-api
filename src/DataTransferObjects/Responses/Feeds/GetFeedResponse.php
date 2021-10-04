<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds\FeedListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds\FeedSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetFeedResponse extends BaseResponse
{
    public ?FeedSchema $feed;
}
