<?php

namespace Jasara\AmznSPA\Data\Schemas\FulfillmentInbound\v0;

use Jasara\AmznSPA\Data\Schemas\AmountSchema;
use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class BoxContentsFeeDetailsSchema extends BaseSchema
{
    public function __construct(
        public int $total_units,
        public AmountSchema $fee_per_unit,
        public AmountSchema $total_fee,
    ) {
    }
}
