<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class PayWithAmazonEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $seller_order_id = null,
        public ?string $transaction_posted_date = null,
        public ?string $business_object_type = null,
        public ?string $sales_channel = null,
        public ?ChargeComponentSchema $charge = null,
        public ?FeeComponentListSchema $fee_list = null,
        public ?string $payment_amount_type = null,
        public ?string $amount_description = null,
        public ?string $fulfillment_channel = null,
        public ?string $store_name = null,
    ) {}
}
