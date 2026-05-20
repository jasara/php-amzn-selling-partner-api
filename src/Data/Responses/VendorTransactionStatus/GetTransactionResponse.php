<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorTransactionStatus;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorTransactionStatus\TransactionStatusSchema;

class GetTransactionResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionStatusSchema $payload = null,
    ) {}

}
