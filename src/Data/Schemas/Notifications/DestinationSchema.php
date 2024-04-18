<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class DestinationSchema extends BaseSchema
{
    public function __construct(
        public string $name,
        public string $destination_id,
        public DestinationResourceSchema $resource,
    ) {
    }
}
