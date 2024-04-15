<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Requests\BaseRequest;

class DestinationResourceSpecificationSchema extends BaseRequest
{
    public ?SqsResourceSchema $sqs;

    public ?EventBridgeResourceSpecificationSchema $event_bridge;
}
