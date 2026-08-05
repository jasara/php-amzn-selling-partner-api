<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\Tracking;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Tracking\TrackingDetailSchema;

final class GetShipmentTrackingResponse extends BaseResponse
{
    public function __construct(
        public ?TrackingDetailSchema $tracking_detail,
    ) {
    }
}
