<?php

namespace Jasara\AmznSPA\Data\Responses\MerchantFulfillment;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\MerchantFulfillment\GetAdditionalSellerInputsResultSchema;

class GetAdditionalSellerInputsResponse extends BaseResponse
{
    public ?GetAdditionalSellerInputsResultSchema $payload;
}
