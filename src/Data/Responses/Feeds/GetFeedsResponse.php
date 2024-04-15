<?php

namespace Jasara\AmznSPA\Data\Responses\Feeds;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedListSchema;
use Jasara\AmznSPA\Data\Schemas\Feeds\FeedSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetFeedsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: FeedSchema::class)]
    public FeedListSchema $feeds;

    public ?string $next_token;
}
