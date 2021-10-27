<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Schemas\ShippingAddressSchema;
use Spatie\DataTransferObject\DataTransferObject;

class OrderAddressSchema extends DataTransferObject
{
    public string $amazon_order_id;

    public ?ShippingAddressSchema $shipping_address;
}
