<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SegmentDetails extends BaseSchema
{
    public function __construct(
        public ?float $glance_view_weight_percentage = null,
        public ?SampleLocation $sample_location = null,
    ) {
    }
}