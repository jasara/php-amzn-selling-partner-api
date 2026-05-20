<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorInvoices;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorInvoices\TransactionIdSchema;

class SubmitInvoicesResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionIdSchema $payload = null,
    ) {}

}
