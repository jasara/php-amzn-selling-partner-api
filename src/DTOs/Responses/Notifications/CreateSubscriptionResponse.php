<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Casts\SubscriptionSchemaPayloadCaster;
use Jasara\AmznSPA\DTOs\Responses\BaseResponse;
use Jasara\AmznSPA\DTOs\Schemas\SubscriptionSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class CreateSubscriptionResponse extends BaseResponse
{
    #[CastWith(SubscriptionSchemaPayloadCaster::class)]
    public ?SubscriptionSchema $payload;
}
