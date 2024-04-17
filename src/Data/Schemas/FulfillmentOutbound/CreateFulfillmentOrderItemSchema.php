<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreateFulfillmentOrderItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_sku,
        public string $seller_fulfillment_order_item_id,
        public ?int $quantity,
        public ?string $gift_message,
        public ?string $displayable_comment,
        public ?string $fulfillment_network_sku,
        public ?AmountSchema $per_unit_declared_value,
        public ?AmountSchema $per_unit_price,
        public ?AmountSchema $per_unit_tax,
    ) {
    }
}
