<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SpdTrackingDetailSchema extends BaseSchema
{
    public function __construct(
        public ?SpdTrackingItemSchemaList $spd_tracking_items,
    ) {
    }
}
