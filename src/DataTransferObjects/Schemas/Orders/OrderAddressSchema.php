<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\Orders;

use Spatie\DataTransferObject\DataTransferObject;

class OrderAddressSchema extends DataTransferObject
{
    public string $amazon_order_id;

    public ?OrderAddressDetailSchema $shipping_address;
}
