<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class EBTRefundReimbursementOnlyEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $order_id = null,
        public ?string $posted_date = null,
        public ?CurrencySchema $amount = null,
    ) {}
}
