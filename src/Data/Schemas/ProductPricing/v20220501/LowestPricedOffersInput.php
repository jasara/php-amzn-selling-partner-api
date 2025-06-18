<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class LowestPricedOffersInput extends BaseSchema
{
    public function __construct(
        public ?Condition $item_condition = null,
        public ?FulfillmentType $fulfillment_type = null,
    ) {
    }
}