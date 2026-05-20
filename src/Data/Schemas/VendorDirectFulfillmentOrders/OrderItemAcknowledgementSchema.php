<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class OrderItemAcknowledgementSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_sequence_number = null,
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $acknowledged_quantity = null,
    ) {}
}
