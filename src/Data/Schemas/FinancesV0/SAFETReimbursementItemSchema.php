<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\FinancesV0;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class SAFETReimbursementItemSchema extends BaseSchema
{
    public function __construct(
        public ?ChargeComponentListSchema $item_charge_list = null,
        public ?string $product_description = null,
        public ?string $quantity = null,
    ) {}
}
