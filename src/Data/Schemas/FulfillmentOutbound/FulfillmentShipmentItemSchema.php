<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentShipmentItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_sku,
        public string $seller_fulfillment_order_item_id,
        public int $quantity,
        public ?string $package_number,
        public ?string $serial_number,
    ) {
    }
}
