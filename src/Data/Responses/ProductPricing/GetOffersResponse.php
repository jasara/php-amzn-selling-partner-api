<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\GetOffersResultSchema;

class GetOffersResponse extends BaseResponse
{
    public ?GetOffersResultSchema $payload;
}
