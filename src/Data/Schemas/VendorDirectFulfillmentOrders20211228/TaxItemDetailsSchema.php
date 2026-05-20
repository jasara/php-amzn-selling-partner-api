<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentOrders20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class TaxItemDetailsSchema extends BaseSchema
{
    public function __construct(
        public ?TaxLineItemSchema $tax_line_item = null,
    ) {}
}
