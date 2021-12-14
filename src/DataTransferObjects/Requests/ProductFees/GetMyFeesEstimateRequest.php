<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\ProductFees;

use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees\FeesEstimateRequestSchema;

class GetMyFeesEstimateRequest extends BaseRequest
{
    public ?FeesEstimateRequestSchema $fees_estimate_request;
}
