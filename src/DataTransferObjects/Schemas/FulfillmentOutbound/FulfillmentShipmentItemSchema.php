<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class FulfillmentShipmentItemSchema extends DataTransferObject
{
    public string $seller_sku;

    public string $seller_fulfillment_order_item_id;

    public int $quantity;

    public ?string $package_number;

    public ?string $serial_number;
}
