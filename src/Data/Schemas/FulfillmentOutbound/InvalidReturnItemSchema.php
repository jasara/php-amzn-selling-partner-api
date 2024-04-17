<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvalidReturnItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_return_item_id,
        public string $seller_fulfillment_order_item_id,
        public InvalidItemReasonSchema $invalid_item_reason,
    ) {
    }
}
