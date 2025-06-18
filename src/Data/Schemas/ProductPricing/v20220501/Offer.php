<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class Offer extends BaseSchema
{
    public function __construct(
        public MoneyType $listing_price,
        public ?string $seller_id = null,
        public ?FulfillmentType $fulfillment_type = null,
        public ?string $sub_condition = null,
        public ?ShippingOptionList $shipping_options = null,
        public ?Points $points = null,
        public ?PrimeDetails $prime_details = null,
    ) {
    }
}