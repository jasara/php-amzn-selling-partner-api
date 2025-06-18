<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OfferIdentifier extends BaseSchema
{
    public function __construct(
        public string $marketplace_id,
        public string $seller_id,
        public ?string $sku = null,
        public ?string $asin = null,
        public ?PrimeDetails $prime_information = null,
        public ?FulfillmentType $fulfillment_type = null,
        public ?ShippingOptionList $shipping_options = null,
    ) {
    }
}