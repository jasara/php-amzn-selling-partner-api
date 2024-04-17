<?php

namespace Jasara\AmznSPA\Data\Requests\ProductFees;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\ProductFees\FeesEstimateRequestSchema;

class GetMyFeesEstimateRequest extends BaseRequest
{
    public function __construct(
        public ?FeesEstimateRequestSchema $fees_estimate_request = null,
    ) {
    }
}
