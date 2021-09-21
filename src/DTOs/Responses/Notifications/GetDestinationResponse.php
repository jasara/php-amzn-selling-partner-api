<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Casts\DestinationSchemaPayloadCaster;
use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\DestinationSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class GetDestinationResponse extends BaseResponse
{
    #[CastWith(DestinationSchemaPayloadCaster::class)]
    public ?DestinationSchema $payload;
}
