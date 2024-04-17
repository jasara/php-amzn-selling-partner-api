<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DestinationResourceSchema extends BaseSchema
{
    public function __construct(
        public ?SqsResourceSchema $sqs,
        public ?EventBridgeResourceSchema $event_bridge,
    ) {
    }
}
