<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class EventBridgeResourceSchema extends DataTransferObject
{
    public string $name;

    public string $region;

    public string $account_id;
}
