<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\ProductFees;

use Spatie\DataTransferObject\DataTransferObject;

class GetMyFeesEstimateResultSchema extends DataTransferObject
{
    public ?FeesEstimateResultSchema $fees_estimate_result;
}
