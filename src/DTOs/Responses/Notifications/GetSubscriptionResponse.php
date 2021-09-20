<?php

namespace Jasara\AmznSPA\DTOs\Responses\Notifications;

use Jasara\AmznSPA\DTOs\Casts\SubscriptionSchemaPayloadCaster;
use Jasara\AmznSPA\DTOs\Schemas\SubscriptionSchema;
use Jasara\AmznSPA\DTOs\Traits\HasErrors;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\DataTransferObject;

class GetSubscriptionResponse extends DataTransferObject
{
    use HasErrors;

    #[CastWith(SubscriptionSchemaPayloadCaster::class)]
    public ?SubscriptionSchema $payload;
}
