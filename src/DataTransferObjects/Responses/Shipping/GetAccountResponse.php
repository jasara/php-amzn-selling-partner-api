<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\Shipping;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Shipping\AccountSchema;

class GetAccountResponse extends BaseResponse
{
    public ?AccountSchema $payload;
}
