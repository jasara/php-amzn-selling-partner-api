<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Notifications;

use Spatie\DataTransferObject\DataTransferObject;

class ProcessingDirectiveSchema extends DataTransferObject
{
    public ?EventFilterSchema $event_filter;
}
