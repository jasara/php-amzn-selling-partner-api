<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\PackageTrackingDetailsSchema;

class GetPackageTrackingDetailsResponse extends BaseResponse
{
    public ?PackageTrackingDetailsSchema $payload;
}
