<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class CreateFeedResponse extends BaseResponse
{
    public function __construct(
        public ?string $feed_id,
    ) {
    }
}
