<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentOutbound;

use Carbon\CarbonImmutable;
use Jasara\AmznSPA\Data\Base\Casts\CarbonFromStringCaster;
use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class FulfillmentOrderItemSchema extends BaseSchema
{
    public function __construct(
        public string $seller_sku,
        public string $seller_fulfillment_order_item_id,
        public int $quantity,
        public ?string $gift_message,
        public ?string $displayable_comment,
        public ?string $fulfillment_network_sku,
        public ?string $order_item_disposition,
        public int $cancelled_quantity,
        public int $unfulfillable_quantity,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $estimated_ship_date,
        #[CarbonFromStringCaster]
        public ?CarbonImmutable $estimated_arrival_date,
        public ?AmountSchema $per_unit_price,
        public ?AmountSchema $per_unit_tax,
        public ?AmountSchema $per_unit_declared_value,
    ) {
    }
}
