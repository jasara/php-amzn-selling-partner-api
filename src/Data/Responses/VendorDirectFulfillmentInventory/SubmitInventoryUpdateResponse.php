<?php

declare(strict_types=1);

namespace Jasara\AmznSPA\Data\Responses\VendorDirectFulfillmentInventory;

use Jasara\AmznSPA\Data\Responses\BaseResponse;
use Jasara\AmznSPA\Data\Schemas\VendorDirectFulfillmentInventory\TransactionReferenceSchema;

class SubmitInventoryUpdateResponse extends BaseResponse
{
    public function __construct(
        public ?TransactionReferenceSchema $payload = null,
    ) {}

}
