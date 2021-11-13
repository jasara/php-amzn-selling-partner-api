<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\FulfillmentOutbound;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\FeaturesSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound\GetFeaturesResultSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetFeaturesResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: FeaturesSchema::class)]
    public ?GetFeaturesResultSchema $payload;
}
