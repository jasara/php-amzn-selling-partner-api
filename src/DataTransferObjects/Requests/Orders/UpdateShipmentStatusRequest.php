<?php

namespace Jasara\AmznSPA\DataTransferObjects\Requests\Orders;

use Jasara\AmznSPA\DataTransferObjects\Casts\BackedEnumCaster;
use Jasara\AmznSPA\DataTransferObjects\Requests\BaseRequest;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Orders\UpdateShipmentStatusOrderItemListSchema;
use Jasara\AmznSPA\DataTransferObjects\Schemas\Orders\UpdateShipmentStatusOrderItemSchema;
use Jasara\AmznSPA\Enums\Orders\ShipmentStatus;
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
