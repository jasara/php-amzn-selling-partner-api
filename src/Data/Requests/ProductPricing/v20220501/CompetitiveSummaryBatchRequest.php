<?php

namespace Jasara\AmznSPA\Data\Requests\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Requests\BaseRequest;

class CompetitiveSummaryBatchRequest extends BaseRequest
{
    public function __construct(
        public CompetitiveSummaryRequestList $requests,
    ) {
    }
}