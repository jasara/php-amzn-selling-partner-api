<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvoiceItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $item_sequence_number = null,
        public ?string $buyer_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $invoiced_quantity = null,
        public ?MoneySchema $net_cost = null,
        public ?string $purchase_order_number = null,
        public ?string $vendor_order_number = null,
        public ?string $hsn_code = null,
        public ?array $tax_details = null,
        public ?array $charge_details = null,
    ) {}
}
