<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class EventBridgeResourceSpecificationSchema extends DataTransferObject
{
    public string $region;

    public string $account_id;
}
