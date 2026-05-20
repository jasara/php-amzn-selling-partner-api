<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TDSReimbursementEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $tds_order_id = null,
        public ?CurrencySchema $reimbursed_amount = null,
    ) {}
}
