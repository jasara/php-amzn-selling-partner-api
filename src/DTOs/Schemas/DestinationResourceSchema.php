<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class DestinationResourceSchema extends DataTransferObject
{
    public ?SqsResourceSchema $sqs;

    public ?EventBridgeResourceSchema $event_bridge;
}
