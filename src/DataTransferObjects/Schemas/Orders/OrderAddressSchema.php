<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Jasara\AmznSPA\DataTransferObjects\Schemas\AddressSchema;
use Spatie\DataTransferObject\DataTransferObject;

class OrderAddressSchema extends DataTransferObject
{
    public string $amazon_order_id;

    public ?AddressSchema $shipping_address;
}
