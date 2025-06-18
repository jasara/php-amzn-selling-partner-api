<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Responses\BaseResponse;

class CompetitiveSummaryBatchResponse extends BaseResponse
{
    public function __construct(
        public CompetitiveSummaryResponseList $responses,
    ) {
    }
}