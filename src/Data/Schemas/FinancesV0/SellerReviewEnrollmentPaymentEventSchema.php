<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SellerReviewEnrollmentPaymentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $enrollment_id = null,
        public ?string $parent_asin = null,
        public ?FeeComponentSchema $fee_component = null,
        public ?ChargeComponentSchema $charge_component = null,
        public ?CurrencySchema $total_amount = null,
    ) {}
}
