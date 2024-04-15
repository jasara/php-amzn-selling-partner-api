<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class SubscriptionSchema extends DataTransferObject
{
    public string $subscription_id;

    public string $payload_version;

    public string $destination_id;
}
