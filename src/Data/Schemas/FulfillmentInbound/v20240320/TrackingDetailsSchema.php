<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TrackingDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?LtlTrackingDetailSchema $ltl_tracking_detail,
        public ?SpdTrackingDetailSchema $spd_tracking_detail,
    ) {
    }
}
