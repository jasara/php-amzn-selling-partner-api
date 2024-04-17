<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProcessingDirectiveSchema extends BaseSchema
{
    public function __construct(
        public ?EventFilterSchema $event_filter,
    ) {
    }
}
