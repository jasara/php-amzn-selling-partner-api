<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping20211228;

use Jasara\AmznSPA\Data\Schemas\BaseSchema;

class CustomerInvoiceListSchema extends BaseSchema
{
    public function __construct(
        public ?PaginationSchema $pagination = null,
        public ?array $customer_invoices = null,
    ) {}
}
