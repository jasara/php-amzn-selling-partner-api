<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CouponPaymentEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $posted_date = null,
        public ?string $coupon_id = null,
        public ?string $seller_coupon_description = null,
        public ?int $clip_or_redemption_count = null,
        public ?string $payment_event_id = null,
        public ?FeeComponentSchema $fee_component = null,
        public ?ChargeComponentSchema $charge_component = null,
        public ?CurrencySchema $total_amount = null,
    ) {}
}
