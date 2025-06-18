<?php

namespace Jasara\AmznSPA\Data\Responses\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\CompetitiveSummaryResponseBody;
use Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501\HttpStatusLine;

class CompetitiveSummaryResponse extends BaseResponse
{
    public function __construct(
        public HttpStatusLine $status,
        public CompetitiveSummaryResponseBody $body,
    ) {
    }
}