<?php

namespace Jasara\AmznSPA\DTOs\Casts;

use Jasara\AmznSPA\DTOs\Schemas\SubscriptionSchema;
use Spatie\DataTransferObject\Caster;

class SubscriptionSchemaPayloadCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): SubscriptionSchema
    {
        return new SubscriptionSchema(
            subscription_id: $value['subscriptionId'],
            payload_version: $value['payloadVersion'],
            destination_id: $value['destinationId'],
        );
    }
}
