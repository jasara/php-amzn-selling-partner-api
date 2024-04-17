<?php

namespace Jasara\AmznSPA\Data\Responses\ProductFees;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductFees\GetMyFeesEstimateResultSchema;

class GetMyFeesEstimateResponse extends BaseResponse
{
    public function __construct(
        public ?GetMyFeesEstimateResultSchema $payload,
    ) {
    }
}
