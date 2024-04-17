<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateReturnItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_return_item_id,
        public string $seller_fulfillment_order_item_id,
        public string $amazon_shipment_id,
        public string $return_reason_code,
        public ?string $return_comment,
    ) {
    }
}
