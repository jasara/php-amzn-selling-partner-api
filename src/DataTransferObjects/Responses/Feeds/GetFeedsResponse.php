<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Feeds;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds\FeedListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Feeds\FeedSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetFeedsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: FeedSchema::class)]
    public FeedListSchema $feeds;

    public ?string $next_token;
}
