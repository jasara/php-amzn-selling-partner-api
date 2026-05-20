<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvoiceItemSchema extends BaseSchema
{
    public function __construct(
        public ?int $item_sequence_number = null,
        public ?string $amazon_product_identifier = null,
        public ?string $vendor_product_identifier = null,
        public ?ItemQuantitySchema $invoiced_quantity = null,
        public ?MoneySchema $net_cost = null,
        public ?string $net_cost_unit_of_measure = null,
        public ?string $purchase_order_number = null,
        public ?string $hsn_code = null,
        public ?CreditNoteDetailsSchema $credit_note_details = null,
        public ?array $tax_details = null,
        public ?array $charge_details = null,
        public ?array $allowance_details = null,
    ) {}
}
