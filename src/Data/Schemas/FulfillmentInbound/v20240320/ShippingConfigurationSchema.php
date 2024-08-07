<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v20240320;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShippingConfigurationSchema extends BaseSchema
{
    public function __construct(
        public ?ShippingMode $shipping_mode,
        public ?ShippingSolution $shipping_solution,
    ) {
    }
}
