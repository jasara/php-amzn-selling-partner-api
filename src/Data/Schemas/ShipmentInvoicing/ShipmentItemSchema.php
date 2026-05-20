<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\ShipmentInvoicing;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ShipmentItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $asin = null,
        public ?string $seller_sku = null,
        public ?string $order_item_id = null,
        public ?string $title = null,
        public ?float $quantity_ordered = null,
        public ?MoneySchema $item_price = null,
        public ?MoneySchema $shipping_price = null,
        public ?MoneySchema $gift_wrap_price = null,
        public ?MoneySchema $shipping_discount = null,
        public ?MoneySchema $promotion_discount = null,
        public ?array $serial_numbers = null,
    ) {}
}
