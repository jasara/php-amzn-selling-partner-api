<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderAddressSchema extends BaseSchema
{
    public function __construct(
        public string $amazon_order_id,
        public ?OrderAddressDetailSchema $shipping_address,
    ) {
    }
}
