<?php

namespace Jasara\AmznSPA\Data\Schemas\ListingsItems;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;
use Jasara\AmznSPA\Data\Schemas\MoneySchema;

class ItemProcurementSchema extends BaseSchema
{
    public function __construct(
        public MoneySchema $cost_price,
    ) {
    }
}
