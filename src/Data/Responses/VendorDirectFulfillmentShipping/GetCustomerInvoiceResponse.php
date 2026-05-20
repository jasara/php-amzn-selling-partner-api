<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentShipping;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentShipping\CustomerInvoiceSchema;

class GetCustomerInvoiceResponse extends BaseResponse
{
    public function __construct(
        public ?CustomerInvoiceSchema $payload = null,
    ) {}

}
