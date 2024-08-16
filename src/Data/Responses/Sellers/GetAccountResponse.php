<?php

namespace Jasara\AmznSPA\Data\Responses\Sellers;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\Sellers\AccountSchema;

class GetAccountResponse extends BaseResponse
{
    public function __construct(
        public ?AccountSchema $payload,
    ) {
    }
}
