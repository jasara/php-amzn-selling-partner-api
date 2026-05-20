<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvoiceSchema extends BaseSchema
{
    public function __construct(
        public ?string $invoice_type = null,
        public ?string $id = null,
        public ?string $reference_number = null,
        public ?string $date = null,
        public ?PartyIdentificationSchema $remit_to_party = null,
        public ?PartyIdentificationSchema $ship_to_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?PartyIdentificationSchema $bill_to_party = null,
        public ?PaymentTermsSchema $payment_terms = null,
        public ?MoneySchema $invoice_total = null,
        public ?array $tax_details = null,
        public ?array $additional_details = null,
        public ?array $charge_details = null,
        public ?array $allowance_details = null,
        public ?array $items = null,
    ) {}
}
