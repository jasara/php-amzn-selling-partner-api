<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\MerchantFulfillment;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\MerchantFulfillment\GetAdditionalSellerInputsResultSchema;

class GetAdditionalSellerInputsResponse extends BaseResponse
{
    public ?GetAdditionalSellerInputsResultSchema $payload;
}
