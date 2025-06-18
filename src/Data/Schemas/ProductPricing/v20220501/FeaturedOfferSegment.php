<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeaturedOfferSegment extends BaseSchema
{
    public function __construct(
        public string $customer_membership,
        public SegmentDetails $segment_details,
    ) {
    }
}