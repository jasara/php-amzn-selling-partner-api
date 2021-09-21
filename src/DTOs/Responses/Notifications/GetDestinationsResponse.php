<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Casts\DestinationListSchemaPayloadCaster;
use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\DestinationListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class GetDestinationsResponse extends BaseResponse
{
    #[CastWith(DestinationListSchemaPayloadCaster::class)]
    public ?DestinationListSchema $payload;
}
