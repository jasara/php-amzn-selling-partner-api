<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class GetFulfillmentOrderResultSchema extends DataTransferObject
{
    public FulfillmentOrderSchema $fulfillment_order;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentOrderItemSchema::class)]
    public FulfillmentOrderItemListSchema $fulfillment_order_items;

    #[CastWith(ArrayCaster::class, itemType: FulfillmentShipmentSchema::class)]
    public ?FulfillmentShipmentListSchema $fulfillment_shipments;

    #[CastWith(ArrayCaster::class, itemType: ReturnItemSchema::class)]
    public ReturnItemListSchema $return_items;

    #[CastWith(ArrayCaster::class, itemType: ReturnAuthorizationSchema::class)]
    public ReturnAuthorizationListSchema $return_authorizations;
}
