<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use ArrayObject;
use Spatie\DataTransferObject\DataTransferObject;

class DestinationResourceSpecificationSchema extends DataTransferObject
{
    public ?SqsResourceSchema $sqs;

    public ?EventBridgeResourceSpecificationSchema $event_bridge;

    public function toArrayObject(): ArrayObject
    {
        return new ArrayObject(array_filter([
            'sqs' => $this->sqs?->toArray(),
            'eventBridge' => $this->event_bridge?->toArray(),
        ]));
    }
}
