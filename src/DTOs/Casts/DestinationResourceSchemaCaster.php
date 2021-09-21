<?php

namespace Jasara\AmznSPA\DTOs\Casts;

use Jasara\AmznSPA\DTOs\Schemas\DestinationResourceSchema;
use Jasara\AmznSPA\DTOs\Schemas\EventBridgeResourceSchema;
use Jasara\AmznSPA\DTOs\Schemas\SqsResourceSchema;
use Spatie\DataTransferObject\Caster;

class DestinationResourceSchemaCaster implements Caster
{
    /**
     * @param array|mixed $value
     *
     * @return mixed
     */
    public function cast(mixed $value): DestinationResourceSchema
    {
        $has_sqs = array_key_exists('sqs', $value);
        $has_event_bridge = array_key_exists('eventBridge', $value);

        return new DestinationResourceSchema(
            sqs: $has_sqs ? new SqsResourceSchema(
                arn: $value['sqs']['arn'],
            ) : null,
            event_bridge: $has_event_bridge ? new EventBridgeResourceSchema(
                name: $value['eventBridge']['name'],
                region: $value['eventBridge']['region'],
                account_id: $value['eventBridge']['accountId'],
            ) : null,
        );
    }
}
