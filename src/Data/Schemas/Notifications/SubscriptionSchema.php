<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SubscriptionSchema extends BaseSchema
{
    public function __construct(
        public string $subscription_id,
        public string $payload_version,
        public string $destination_id,
    ) {
    }
}
