<?php

namespace Jasara\AmznSPA\Data\Schemas\Orders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderBuyerInfoSchema extends BaseSchema
{
    public function __construct(
        public string $amazon_order_id,
        public ?string $buyer_email,
        public ?string $buyer_name,
        public ?string $buyer_county,
        public ?BuyerTaxInfoSchema $buyer_tax_info,
        public ?string $purchase_order_number,
    ) {
    }
}
