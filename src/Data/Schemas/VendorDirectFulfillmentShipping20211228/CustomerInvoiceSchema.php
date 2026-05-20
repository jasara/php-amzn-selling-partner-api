<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CustomerInvoiceSchema extends BaseSchema
{
    public function __construct(
        public ?string $purchase_order_number = null,
        public ?string $content = null,
    ) {}
}
