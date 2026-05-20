<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class ServiceFeeEventSchema extends BaseSchema
{
    public function __construct(
        public ?string $amazon_order_id = null,
        public ?string $fee_reason = null,
        public ?FeeComponentListSchema $fee_list = null,
        public ?string $seller_sku = null,
        public ?string $fn_sku = null,
        public ?string $fee_description = null,
        public ?string $asin = null,
        public ?string $store_name = null,
    ) {}
}
