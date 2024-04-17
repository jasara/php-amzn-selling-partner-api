<?php

namespace Jasara\AmznSPA\Data\Requests\Orders;

use Jasara\AmznSPA\Data\Base\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Orders\ShipmentStatus;
use Jasara\AmznSPA\Data\Schemas\Orders\UpdateShipmentStatusOrderItemListSchema;
use Spatie\DataTransferObject\Attributes\CastWith;

class UpdateShipmentStatusRequest extends BaseRequest
{
    public function __construct(
        public string $marketplace_id,
        #[CastWith(BackedEnumCaster::class)]
        public ShipmentStatus $shipment_status,

        public ?UpdateShipmentStatusOrderItemListSchema $order_items,
    ) {
    }
}
