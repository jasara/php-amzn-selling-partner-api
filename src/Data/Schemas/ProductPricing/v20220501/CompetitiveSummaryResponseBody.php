<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CompetitiveSummaryResponseBody extends BaseSchema
{
    public function __construct(
        public string $asin,
        public string $marketplace_id,
        public ?FeaturedBuyingOptionList $featured_buying_options = null,
        public ?ReferencePriceList $reference_prices = null,
        public ?SegmentedFeaturedOfferList $segmented_featured_offers = null,
        public ?LowestPricedOfferList $lowest_priced_offers = null,
        public ?array $errors = null,
    ) {
    }
}