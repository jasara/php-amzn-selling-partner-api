<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\TrackingInformationSchema;

class GetTrackingInformationResponse extends BaseResponse
{
    public ?TrackingInformationSchema $payload;
}
