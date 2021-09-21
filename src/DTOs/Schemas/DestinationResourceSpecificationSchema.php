<?php

namespace Jasara\AmznSPA\DTOs\Schemas;

use Spatie\DataTransferObject\DataTransferObject;

class DestinationResourceSpecificationSchema extends DataTransferObject
{
    public ?SqsResourceSchema $sqs;

    public ?EventBridgeResourceSpecificationSchema $event_bridge;

    public function toArray(): array
    {
        return array_filter([
            'sqs' => $this->sqs?->toArray(),
            'eventBridge' => $this->event_bridge?->toArray(),
        ]);
    }
}
