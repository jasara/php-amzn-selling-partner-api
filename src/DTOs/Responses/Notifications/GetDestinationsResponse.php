<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\Notifications\DestinationListSchema;
use Jasara\AmznSPA\DTOs\Schemas\Notifications\DestinationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetDestinationsResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: DestinationSchema::class)]
    public ?DestinationListSchema $payload;
}
