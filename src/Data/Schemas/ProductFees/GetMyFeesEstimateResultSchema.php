<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Spatie\DataTransferObject\DataTransferObject;

class GetMyFeesEstimateResultSchema extends DataTransferObject
{
    public ?FeesEstimateResultSchema $fees_estimate_result;
}
