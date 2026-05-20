<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\Finances;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ContextSchema extends BaseSchema
{
    public function __construct(
        public ?string $context_type = null,
        public ?string $store_name = null,
        public ?string $order_type = null,
        public ?string $channel = null,
        public ?string $asin = null,
        public ?string $sku = null,
        public ?int $quantity_shipped = null,
        public ?string $fulfillment_network = null,
        public ?string $payment_type = null,
        public ?string $payment_method = null,
        public ?string $payment_reference = null,
        public ?string $payment_date = null,
        public ?string $deferral_reason = null,
        public ?string $maturity_date = null,
        public ?string $start_time = null,
        public ?string $end_time = null,
    ) {}
}
