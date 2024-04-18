<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\PriceListSchema;

class GetPricingResponse extends BaseResponse
{
    public function __construct(
        public ?PriceListSchema $payload,
    ) {
    }
}
