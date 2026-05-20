<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentPayments;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentPayments\TransactionReferenceSchema;

class SubmitInvoiceResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionReferenceSchema $payload = null,
    ) {}

}
