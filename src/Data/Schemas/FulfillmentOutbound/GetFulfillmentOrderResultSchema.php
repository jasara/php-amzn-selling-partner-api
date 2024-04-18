<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class GetFulfillmentOrderResultSchema extends BaseSchema
{
    public function __construct(
        public FulfillmentOrderSchema $fulfillment_order,

        public FulfillmentOrderItemListSchema $fulfillment_order_items,

        public ?FulfillmentShipmentListSchema $fulfillment_shipments,

        public ReturnItemListSchema $return_items,

        public ReturnAuthorizationListSchema $return_authorizations,
    ) {
    }
}
