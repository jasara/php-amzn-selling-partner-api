<?php

namespace Jasara\AmznSPA\DataTransferObjects\Responses\ProductFees;

use Jasara\AmznSPA\DataTransferObjects\Responses\BaseResponse;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees\GetMyFeesEstimateResultSchema;

class GetMyFeesEstimateResponse extends BaseResponse
{
    public ?GetMyFeesEstimateResultSchema $payload;
}
