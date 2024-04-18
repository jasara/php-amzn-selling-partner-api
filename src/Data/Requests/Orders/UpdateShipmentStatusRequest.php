<?php

namespace Jasara\AmznSPA\Data\Requests\Orders;

use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Orders\ShipmentStatus;
use Jasara\AmznSPA\Data\Schemas\Orders\UpdateShipmentStatusOrderItemListSchema;

class UpdateShipmentStatusRequest extends BaseRequest
{
    public function __construct(
        public string $marketplace_id,
        public ShipmentStatus $shipment_status,
        public ?UpdateShipmentStatusOrderItemListSchema $order_items,
    ) {
    }
}
