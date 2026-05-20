<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentTransactions;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentTransactions\TransactionStatusSchema;

class GetTransactionStatusResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionStatusSchema $payload = null,
    ) {}

}
