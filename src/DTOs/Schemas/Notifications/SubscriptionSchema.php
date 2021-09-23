<?php

namespace Jasara\AmznSPA\DTOs\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class SubscriptionSchema extends DataTransferObject
{
    public string $subscription_id;

    public string $payload_version;

    public string $destination_id;
}
