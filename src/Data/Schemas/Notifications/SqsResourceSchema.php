<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SqsResourceSchema extends BaseSchema
{
    public function __construct(
        public string $arn,
    ) {
    }
}
