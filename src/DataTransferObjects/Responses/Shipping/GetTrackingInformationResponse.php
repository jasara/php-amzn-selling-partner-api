<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\TrackingInformationSchema;

class GetTrackingInformationResponse extends BaseResponse
{
    public ?TrackingInformationSchema $payload;
}
