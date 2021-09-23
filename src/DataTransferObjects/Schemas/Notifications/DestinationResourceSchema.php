<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class DestinationResourceSchema extends DataTransferObject
{
    public ?SqsResourceSchema $sqs;

    public ?EventBridgeResourceSchema $event_bridge;
}
