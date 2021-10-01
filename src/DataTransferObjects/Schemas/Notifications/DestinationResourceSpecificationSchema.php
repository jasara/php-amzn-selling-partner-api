<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;

class DestinationResourceSpecificationSchema extends BaseRequest
{
    public ?SqsResourceSchema $sqs;

    public ?EventBridgeResourceSpecificationSchema $event_bridge;
}
