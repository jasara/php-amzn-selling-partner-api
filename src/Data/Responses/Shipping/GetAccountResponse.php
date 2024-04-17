<?php

namespace Jasara\AmznSPA\Data\Responses\Shipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Shipping\AccountSchema;

class GetAccountResponse extends BaseResponse
{
    public function __construct(
        public ?AccountSchema $payload,
    ) {
    }
}
