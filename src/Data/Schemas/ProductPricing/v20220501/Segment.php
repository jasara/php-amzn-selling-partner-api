<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class Segment extends BaseSchema
{
    public function __construct(
        public ?SegmentDetails $segment_details = null,
    ) {
    }
}