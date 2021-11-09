<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\GetRatesResultSchema;

class GetRatesResponse extends BaseResponse
{
    public ?GetRatesResultSchema $payload;
}
