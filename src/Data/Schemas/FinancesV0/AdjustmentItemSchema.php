<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class AdjustmentItemSchema extends BaseSchema
{
    public function __construct(
        public ?string $quantity = null,
        public ?CurrencySchema $per_unit_amount = null,
        public ?CurrencySchema $total_amount = null,
        public ?string $seller_sku = null,
        public ?string $fn_sku = null,
        public ?string $product_description = null,
        public ?string $asin = null,
        public ?string $transaction_number = null,
    ) {}
}
