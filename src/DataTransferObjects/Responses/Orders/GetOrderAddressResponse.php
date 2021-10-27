<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Orders;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Orders\OrderAddressSchema;

class GetOrderAddressResponse extends BaseResponse
{
    public ?OrderAddressSchema $payload;
}
