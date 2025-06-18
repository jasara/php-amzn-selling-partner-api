<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CompetitiveSummaryIncludedDataList extends BaseSchema
{
    public function __construct(
        public array $competitive_summary_included_data,
    ) {
    }
}