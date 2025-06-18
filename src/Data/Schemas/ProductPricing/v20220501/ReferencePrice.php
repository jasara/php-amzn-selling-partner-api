<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ReferencePrice extends BaseSchema
{
    public function __construct(
        public string $name,
        public MoneyType $price,
        public ?Condition $condition = null,
        public ?FulfillmentType $subcondition = null,
    ) {
    }
}