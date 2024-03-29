<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\PriceListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\PriceSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class GetPricingResponse extends BaseResponse
{
    #[CastWith(ArrayCaster::class, itemType: PriceSchema::class)]
    public ?PriceListSchema $payload;
}
