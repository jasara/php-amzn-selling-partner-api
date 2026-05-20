<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentTransactions20211228;

use Jasara\AmznSPA\Contracts\IsFlatResponse;
use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentTransactions20211228\TransactionStatusSchema;

class GetTransactionStatusResponse extends BaseResponse implements IsFlatResponse
{
    public function __construct(
        public ?TransactionStatusSchema $payload = null,
    ) {}

    public static function mapResponseToParameter(): string
    {
        return 'payload';
    }
}
