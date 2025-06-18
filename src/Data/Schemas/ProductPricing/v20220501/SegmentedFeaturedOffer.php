<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SegmentedFeaturedOffer extends BaseSchema
{
    public function __construct(
        public string $seller_id,
        public Condition $condition,
        public FulfillmentType $fulfillment_type,
        public MoneyType $listing_price,
        public ?ShippingOptionList $shipping_options = null,
        public ?Points $points = null,
        public ?FeaturedOfferSegmentList $featured_offer_segments = null,
    ) {
    }
}