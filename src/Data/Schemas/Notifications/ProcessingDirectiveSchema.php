<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class ProcessingDirectiveSchema extends DataTransferObject
{
    public ?EventFilterSchema $event_filter;
}
