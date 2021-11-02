<?php

namespace Jasara\AmznSPA\DataTransferObjects\Schemas\FulfillmentOutbound;

use Spatie\DataTransferObject\DataTransferObject;

class GetFulfillmentOrderResultSchema extends DataTransferObject
{
    public FulfillmentOrderSchema $fulfillment_order;

    public FulfillmentOrderItemListSchema $fulfillment_order_items;

    public FulfillmentShipmentListsCHEMA $fulfillment_Shipments;

    public ReturnItemListSchema $return_Items;

    public ReturnAuthorizationListSchema $return_authorizations;
}
