<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorInvoices;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CreditNoteDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?string $reference_invoice_number = null,
        public ?string $debit_note_number = null,
        public ?string $returns_reference_number = null,
        public ?string $goods_return_date = null,
        public ?string $rma_id = null,
        public ?string $coop_reference_number = null,
        public ?string $consignors_reference_number = null,
    ) {}
}
