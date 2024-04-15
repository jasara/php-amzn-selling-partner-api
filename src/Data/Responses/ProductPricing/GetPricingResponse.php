<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\PriceListSchema;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\PriceSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetPricingResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: PriceSchema::class)]
    public ?PriceListSchema $payload;
}
