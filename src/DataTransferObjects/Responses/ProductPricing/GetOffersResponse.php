<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ProductPricing;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductPricing\GetOffersResultSchema;

class GetOffersResponse extends BaseResponse
{
    public GetOffersResultSchema $payload;
}
