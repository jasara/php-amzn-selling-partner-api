<?php

namespace Jasara\AmznSPA\Data\Schemas\Notifications;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class EventBridgeResourceSpecificationSchema extends BaseSchema
{
    public function __construct(
        public string $region,
        public string $account_id,
    ) {
    }
}
