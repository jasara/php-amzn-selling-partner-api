<?php

namespace Jasara\AmznSPA\Data\Responses\Notifications;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationListSchema;
use Jasara\AmznSPA\Data\Schemas\Notifications\DestinationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetDestinationsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: DestinationSchema::class)]
    public ?DestinationListSchema $payload;
}
