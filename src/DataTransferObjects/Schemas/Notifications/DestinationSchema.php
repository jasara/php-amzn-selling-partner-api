<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class DestinationSchema extends DataTransferObject
{
    public string $name;

    public string $destination_id;

    public DestinationResourceSchema $resource;
}
