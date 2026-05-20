<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class InvoiceDetailSchema extends BaseSchema
{
    public function __construct(
        public ?string $invoice_number = null,
        public ?string $invoice_date = null,
        public ?string $reference_number = null,
        public ?PartyIdentificationSchema $remit_to_party = null,
        public ?PartyIdentificationSchema $ship_from_party = null,
        public ?PartyIdentificationSchema $bill_to_party = null,
        public ?string $ship_to_country_code = null,
        public ?string $payment_terms_code = null,
        public ?MoneySchema $invoice_total = null,
        public ?array $tax_totals = null,
        public ?array $additional_details = null,
        public ?array $charge_details = null,
        public ?array $items = null,
    ) {}
}
