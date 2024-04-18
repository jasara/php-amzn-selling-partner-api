<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedListSchema;

class GetFeedsResponse extends BaseResponse
{
    public function __construct(
        public FeedListSchema $feeds,
        public ?string $next_token,
    ) {
    }
}
