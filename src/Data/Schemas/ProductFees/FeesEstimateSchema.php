<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class FeesEstimateSchema extends BaseSchema
{
    public function __construct(
        #[CarbonFromStringCaster]
        public CarbonImmutable $time_of_fees_estimation,
        public ?MoneySchema $total_fees_estimate,
        public ?FeeDetailListSchema $fee_detail_list,
    ) {
    }
}
