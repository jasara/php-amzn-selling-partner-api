<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class RentalTransactionEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $amazon_order_id = null,
        public ?string $rental_event_type = null,
        public ?int $extension_length = null,
        public ?string $posted_date = null,
        public ?ChargeComponentListSchema $rental_charge_list = null,
        public ?FeeComponentListSchema $rental_fee_list = null,
        public ?string $marketplace_name = null,
        public ?CurrencySchema $rental_initial_value = null,
        public ?CurrencySchema $rental_reimbursement = null,
        public ?TaxWithheldComponentListSchema $rental_tax_withheld_list = null,
    ) {}
}
