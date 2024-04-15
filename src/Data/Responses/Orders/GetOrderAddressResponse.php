<?php

namespace Jasara\AmznSPA\Data\Responses\Orders;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Orders\OrderAddressSchema;

class GetOrderAddressResponse extends BaseResponse
{
    public ?OrderAddressSchema $payload;
}
