<?php

namespace Jasara\AmznSPA\Data\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\FeaturesSchema;
use Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound\GetFeaturesListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetFeaturesResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: FeaturesSchema::class)]
    public ?GetFeaturesListSchema $payload;
}
