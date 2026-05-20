<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SAFETReimbursementEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $safet_claim_id = null,
        public ?CurrencySchema $reimbursed_amount = null,
        public ?string $reason_code = null,
        public ?SAFETReimbursementItemListSchema $safet_reimbursement_item_list = null,
    ) {}
}
