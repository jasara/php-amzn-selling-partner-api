<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\GetRatesResultSchema;

class GetRatesResponse extends BaseResponse
{
    public ?GetRatesResultSchema $payload;
}
