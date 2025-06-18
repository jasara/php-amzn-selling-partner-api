<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductPricing\v20220501;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShippingOption extends BaseSchema
{
    public function __construct(
        public string $shipping_option_type,
        public ?MoneyType $price = null,
    ) {
    }
}