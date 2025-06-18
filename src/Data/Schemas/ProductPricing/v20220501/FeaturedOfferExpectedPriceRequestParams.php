<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FeaturedOfferExpectedPriceRequestParams extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $sku,
        public ?Segment $segment = null,
    ) {
    }
}