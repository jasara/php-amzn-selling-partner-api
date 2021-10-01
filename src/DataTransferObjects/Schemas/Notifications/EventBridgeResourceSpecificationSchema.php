<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class EventBridgeResourceSpecificationSchema extends DataTransferObject
{
    public string $region;

    public string $account_id;
}
