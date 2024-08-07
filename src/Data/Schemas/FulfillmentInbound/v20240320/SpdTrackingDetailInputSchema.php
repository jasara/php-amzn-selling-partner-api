<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SpdTrackingDetailInputSchema extends BaseSchema
{
    public function __construct(
        public SpdTrackingItemInputSchemaList $spd_tracking_items,
    ) {
    }
}
