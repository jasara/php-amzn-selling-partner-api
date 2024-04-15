<?php

namespace Jasara\AmznSPA\Data\Requests\Orders;

use Jasara\AmznSPA\Data\Casts\BackedEnumCaster;
use Jasara\AmznSPA\Data\Requests\BaseRequest;
use Jasara\AmznSPA\Data\Schemas\Orders\ShipmentStatus;
use Jasara\AmznSPA\Data\Schemas\Orders\UpdateShipmentStatusOrderItemListSchema;
use Jasara\AmznSPA\Data\Schemas\Orders\UpdateShipmentStatusOrderItemSchema;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class UpdateShipmentStatusRequest extends BaseRequest
{
    public string $marketplace_id;

    #[CastWith(BackedEnumCaster::class)]
    public ShipmentStatus $shipment_status;

    #[CastWith(ArrayCaster::class, itemType: UpdateShipmentStatusOrderItemSchema::class)]
    public ?UpdateShipmentStatusOrderItemListSchema $order_items;
}
