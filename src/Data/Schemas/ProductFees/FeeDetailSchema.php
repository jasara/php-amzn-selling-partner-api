<?php

namespace Jasara\AmznSPA\Data\Schemas\ProductFees;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class FeeDetailSchema extends BaseSchema
{
    public function __construct(
        public string $fee_type,
        public MoneySchema $fee_amount,
        public ?MoneySchema $fee_promotion,
        public ?MoneySchema $tax_amount,
        public MoneySchema $final_fee,

        public ?IncludedFeeDetailListSchema $included_fee_detail_list,
    ) {
    }
}
