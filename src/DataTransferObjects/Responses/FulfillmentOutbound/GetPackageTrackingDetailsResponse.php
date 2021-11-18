<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\PackageTrackingDetailsSchema;

class GetPackageTrackingDetailsResponse extends BaseResponse
{
    public ?PackageTrackingDetailsSchema $payload;
}
