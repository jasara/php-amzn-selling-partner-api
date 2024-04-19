<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TrackingDetailsInputSchema extends BaseSchema
{
    public function __construct(
        public ?LtlTrackingDetailInputSchema $ltl_tracking_detail,
        public ?SpdTrackingDetailInputSchema $spd_tracking_detail,
    ) {
    }
}
