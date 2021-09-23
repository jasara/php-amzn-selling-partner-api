<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Notifications;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications\DestinationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetDestinationsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: DestinationSchema::class)]
    public ?DestinationListSchema $payload;
}
