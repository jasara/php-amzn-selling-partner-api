<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeaturedBuyingOption extends BaseSchema
{
    public function __construct(
        public Condition $buying_option_type,
        public SegmentedFeaturedOfferList $segmented_featured_offers,
    ) {
    }
}