<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Contracts\SnakeCaseRequestContract;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ProcessingDirectiveSchema extends BaseSchema implements SnakeCaseRequestContract
{
    public function __construct(
        public ?EventFilterSchema $event_filter,
    ) {
    }
}
