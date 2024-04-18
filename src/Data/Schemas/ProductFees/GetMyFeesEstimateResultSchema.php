<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetMyFeesEstimateResultSchema extends BaseSchema
{
    public function __construct(
        public ?FeesEstimateResultSchema $fees_estimate_result,
    ) {
    }
}
